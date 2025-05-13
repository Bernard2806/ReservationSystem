<?php
// Configuración de cabeceras para evitar caché
header('Content-Type: text/plain');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// URL de la API de GitHub para obtener los commits
$base_url = "https://api.github.com/repos/EEST1Chivilcoy/ReservationSystem/commits";

// Inicia una sesión cURL
$ch = curl_init();

// Función para obtener commits con manejo de paginación
function get_commits($url, $ch)
{
    $commits = [];
    $page = 1;
    $per_page = 100; // Máximo permitido por GitHub

    do {
        $paged_url = $url . "?per_page=$per_page&page=$page";
        curl_setopt($ch, CURLOPT_URL, $paged_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');

        // Opcionalmente, establecer un timeout para evitar bloqueos largos
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        // Ejecuta la solicitud y obtiene la respuesta
        $response = curl_exec($ch);

        // Verifica si hubo un error en la solicitud cURL
        if (curl_errno($ch)) {
            error_log('Error en cURL: ' . curl_error($ch));
            break;
        }

        // Decodifica la respuesta JSON
        $data = json_decode($response, true);

        // Verifica si la decodificación fue exitosa
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            error_log('Error al decodificar JSON: ' . json_last_error_msg());
            break;
        }

        // Verifica si hay un mensaje de error de la API de GitHub
        if (isset($data['message']) && strpos($data['message'], 'API rate limit exceeded') !== false) {
            // Si superamos el límite de la API, usamos una versión por defecto
            error_log('Límite de API de GitHub excedido');
            return [];
        }

        // Añade los commits obtenidos al array total de commits
        if (is_array($data)) {
            $commits = array_merge($commits, $data);
        } else {
            // Si $data no es un array, sal del bucle
            error_log('Error: Datos no válidos recibidos de la API.');
            break;
        }

        // Incrementa el número de página
        $page++;

        // Si no hay más datos o llegamos a un número máximo de páginas por seguridad, salimos
        if (empty($data) || $page > 10) {
            break;
        }

    } while (count($data) == $per_page); // Continúa mientras se obtenga el número máximo de commits por página

    return $commits;
}

// Inicializar variable de versión con valor por defecto
$version = '1.0.0';

// Verificar si hay una versión en caché para evitar llamadas innecesarias a la API
$cache_file = __DIR__ . '/version_cache.txt';
$cache_time = 3600; // 1 hora de caché

if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_time)) {
    // Si existe el archivo de caché y es reciente, usar esa versión
    $version = file_get_contents($cache_file);
} else {
    // Intentar obtener commits y calcular versión
    try {
        // Obtiene todos los commits
        $commits = get_commits($base_url, $ch);

        // Cierra la sesión cURL
        curl_close($ch);

        // Si se obtuvieron commits, calcular la versión
        if (!empty($commits)) {
            // Cuenta el número de commits
            $commit_count = count($commits);

            // Calcula la versión en el formato 0.0.1, 0.1.0, 1.0.0, etc.
            $major = floor($commit_count / 1000);
            $minor = floor(($commit_count % 1000) / 100);
            $patch = $commit_count % 100;
            $version = "$major.$minor.$patch";

            // Guardar en caché para futuras peticiones
            file_put_contents($cache_file, $version);
        }
    } catch (Exception $e) {
        error_log('Error al calcular la versión: ' . $e->getMessage());
        // Se mantiene la versión por defecto 1.0.0
    } finally {
        // Cerrar cURL si aún está abierto
        if (isset($ch) && is_resource($ch)) {
            curl_close($ch);
        }
    }
}

// Imprimir la versión (sin HTML ni PHP adicional)
echo $version;