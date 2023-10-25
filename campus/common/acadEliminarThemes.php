<?php
include("../conexion.php");
$id = $_REQUEST['id'];
$consulta1 = "SELECT module_id FROM aca_themes WHERE id='$id'";
$resultado1 = $conexion->query($consulta1);
$module_id;
if ($resultado1) {
    $module_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
    $module_id = $module_id['module_id']; // Obtener el valor de la columna 'course_id'
}

$consulta = "DELETE FROM `aca_themes` WHERE  id='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header("Location: ../themesLista.php?id=".$module_id);
}

else{
    echo "Tenemos un problema!!!";
}

?>