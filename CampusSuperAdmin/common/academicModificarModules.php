<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$txtPosicion = $_POST['txtPosicion'];
$txtNombre = $_POST['txtNombre'];
$txtidCourses = $_POST['txtidCourses'];



$query = "UPDATE `modules` SET PosicionModules='$txtPosicion', NombreModules='$txtNombre', idCourses='$txtidCourses'
WHERE IDModules='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    echo "Tenemos un Problema";
}

?>