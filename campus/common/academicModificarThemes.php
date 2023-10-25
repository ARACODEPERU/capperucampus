<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$txtPosicion = $_POST['txtPosicion'];
$txtNombre = $_POST['txtNombre'];
$txtidModules = $_POST['txtidModules'];

$query = "UPDATE `aca_themes` SET position='$txtPosicion', description='$txtNombre', module_id='$txtidModules'
WHERE id='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../themesLista.php?id=".$txtidModules);
}
else{
    echo "Tenemos un Problema";
}

?>