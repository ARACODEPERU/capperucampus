<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$txtPosicion = $_POST['txtPosicion'];
$txtNombre = $_POST['txtNombre'];
$txtidModules = $_POST['txtidModules'];

$query = "UPDATE `themes` SET PosicionThemes='$txtPosicion', NombreThemes='$txtNombre', idModules='$txtidModules'
WHERE IDThemes='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    echo "Tenemos un Problema";
}

?>