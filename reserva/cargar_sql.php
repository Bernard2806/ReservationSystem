<?php
include("../include/conexion.php");

session_start();

if (!isset($_SESSION["nombreyapellido"])) {
    header("Location: ../iniciar_sesion.php");
    exit;
}

$nombreapellido = $_SESSION["nombreyapellido"];

$p_curso = $_POST['curso'];
$p_materia = $_POST['materia'];
$p_horario = $_POST['horario'];
$p_horario1 = $_POST['horario1'];
$p_fecha = $_POST['fecha'];
$p_info = $_POST['info'];
$p_materiales = $_POST['materiales'];
$p_boton = $_POST['boton'];

if ($p_boton == 0) {
    header("Location: ../index.php");
    exit();
} else {
    if($p_curso != "Reunión"){
        $division = $_POST["division"];
        $p_curso =  $p_curso . $division;
    }
    // Si se seleccionó "Otro", tomar el valor del campo especificado
    if ($p_info == "Otro") {
        $otro_salon = $_POST["otro_salon"];
        $p_info = $otro_salon;
    }

    // Validar si ya existe una reserva en el mismo salón, fecha y horario
    $consulta = "SELECT COUNT(*) as total FROM tabla WHERE info = ? AND fecha = ? AND ((horario < ? AND horario1 > ?) OR (horario >= ? AND horario < ?))";
    $stmt = mysqli_prepare($conexion, $consulta);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $p_info, $p_fecha, $p_horario1, $p_horario, $p_horario, $p_horario1);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $total_reservas);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($total_reservas > 0) {
            $Message = "El salón ya está reservado en la fecha y horario seleccionados.";
            header("Location: ../index.php?error={$Message}");
            exit;
        }
    } else {
        $Message = "Error en la preparación de la consulta de validación.";
        header("Location: ../index.php?error={$Message}");
        exit;
    }

    // Si no hay reservas conflictivas, proceder a insertar la nueva reserva
    $alta = "INSERT INTO tabla (nombreapellido, curso, materia, horario, horario1, fecha, info, materiales) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $alta);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $nombreapellido, $p_curso, $p_materia, $p_horario, $p_horario1, $p_fecha, $p_info, $p_materiales);
        $resultado_alta = mysqli_stmt_execute($stmt);

        if ($resultado_alta) {
            $Message = "Se ha creado la entrada correctamente.";
            header("Location: ../index.php?success={$Message}");
            exit;
        } else {
            $Message = "Error al intentar crear la entrada.";
            header("Location: ../index.php?error={$Message}");
            exit;
        }
        mysqli_stmt_close($stmt);
    } else {
        $Message = "Error en la preparación de la consulta de inserción.";
        header("Location: ../index.php?error={$Message}");
        exit;
    }

    mysqli_close($conexion);
}
?>