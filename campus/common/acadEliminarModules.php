<?php
include("../conexion.php");
$id = $_REQUEST['id'];

$consulta1 = "SELECT course_id FROM aca_modules WHERE id='$id'";
$resultado1 = $conexion->query($consulta1);

if ($resultado1) {
    $course_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
    $course_id = $course_id['course_id']; // Obtener el valor de la columna 'course_id'

    $consulta = "DELETE FROM `aca_modules` WHERE id='$id'";
    $resultado = $conexion->query($consulta);

    if ($resultado) {
        header("Location: ../modulesLista.php?id=" . $course_id);
    } else {
        echo "Tenemos un problema!!!";
    }
} else {
    echo "Tenemos un problema!!!";
}
?>