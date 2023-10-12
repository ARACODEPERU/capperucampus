<?php
include ("../conexion.php");

$id =$_REQUEST['id'];
$Nivel = $_POST['nivel'];
$Estado = $_POST['estado'];
$Nombre = $_POST['nombre'];
$ApellidoP = $_POST['apellidoP'];
$ApellidoM = $_POST['apellidoM'];
$DNI = $_POST['dni'];
$Email = $_POST['email'];
$Telefono = $_POST['telefono'];
$Departamento = $_POST['departamento'];
$Provincia = $_POST['provincia'];
$Distrito = $_POST['distrito'];
$Ocupacion = $_POST['ocupacion'];
$Presentacion = $_POST['presentacion'];


$query = "UPDATE `users` SET Nivel='$Nivel', Estado='$Estado', Nombre='$Nombre', 
ApellidoP='$ApellidoP', ApellidoM='$ApellidoM', DNI='$DNI', Email='$Email',
Telefono='$Telefono', Departamento='$Departamento', Provincia='$Provincia', Distrito='$Distrito',
Ocupacion='$Ocupacion', Presentacion='$Presentacion'
WHERE id='$id'"; 

$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../usersAlumnos.php");
}
else{
    echo "Tenemos un Problema";
}


?>