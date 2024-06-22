<?php
// Cargar el archivo de configuración
$config = require '../config.php'; // Asegúrate de colocar la ruta correcta

// Obtener los valores de la configuración
$usuario = $config['db']['usuario'];
$clave = $config['db']['clave'];
$servidor = $config['db']['servidor'];
$basededatos = $config['db']['basededatos'];

// Establecer la conexión con la base de datos
$conexion = mysqli_connect($servidor, $usuario, $clave) or die('No se pudo conectar con el servidor');
$db = mysqli_select_db($conexion, $basededatos) or die('No se pudo conectar a la base de datos');
?>
