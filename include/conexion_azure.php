<?php
    $usuario='oxjlrqrbao';
    $clave='$FAAguFaBqpeTzbf';
    $servidor='testpaginaeest1';
    $basededatos='paginaeest1';
    $conexion=mysqli_connect($servidor,$usuario,$clave) or die('No se pudo conectar con el servidor');
    $db=mysqli_select_db($conexion,$basededatos)or die('No se pudo conectar a la base de datos');
?>