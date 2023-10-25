<?php
include("../conexion.php");
$id = $_REQUEST['id'];

$consulta1 = "SELECT theme_id FROM aca_contents WHERE id='$id'";
$resultado1 = $conexion->query($consulta1);
$theme_id;
if ($resultado1) {
    $theme_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
    $theme_id = $theme_id['theme_id']; // Obtener el valor de la columna 'course_id'
}

$consulta = "DELETE FROM `aca_contents` WHERE  id='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header("Location: ../videosLista.php?id=".$theme_id);
}

else{
    echo "Tenemos un problema!!!";
}

?>