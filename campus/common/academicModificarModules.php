<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$txtPosicion = $_POST['txtPosicion'];
$txtNombre = $_POST['txtNombre'];
$txtidCourses = $_POST['txtidCourses'];



$query = "UPDATE `aca_modules` SET position='$txtPosicion', description='$txtNombre', course_id='$txtidCourses'
WHERE id='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../modulesLista.php?id=".$txtidCourses);
}
else{
    echo "Tenemos un Problema";
}

?>