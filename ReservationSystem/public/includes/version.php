<?php
/**
 * Cálculo de versión basado en commits de GitHub
 * ReservationSystem - EEST N° 1 Chivilcoy
 * 
 * Sistema de reservas para la EEST N° 1 Chivilcoy
 * Creado por: Bernardo Andrés, González Erramuspe
 */

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
    } while (count($data) == $per_page); // Continúa mientras se obtenga el número máximo de commits por página

    return $commits;
}

// Inicializar variable de versión con valor por defecto
$GLOBALS['version'] = '1.0.0';

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
        $patch = floor(($commit_count % 100) / 10);
        $GLOBALS['version'] = "$major.$minor.$patch";
    }
} catch (Exception $e) {
    error_log('Error al calcular la versión: ' . $e->getMessage());
    // Se mantiene la versión por defecto 1.0.0
} finally {
    // Cerrar cURL si aún está abierto
    if (is_resource($ch)) {
        curl_close($ch);
    }
}