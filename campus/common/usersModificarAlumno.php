<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$txtNivel = $_POST['txtNivel'];
$txtEstado = $_POST['txtEstado'];
$txtNombre = $_POST['txtNombre'];
$txtApellidoP = $_POST['txtApellidoP'];
$txtApellidoM = $_POST['txtApellidoM'];
$txtDNI = $_POST['txtDNI'];
$txtEmail = $_POST['txtEmail'];
$txtTelefono1 = $_POST['txtTelefono1'];
$txtDepartamento = $_POST['txtDepartamento'];
$txtProvincia = $_POST['txtProvincia'];
$txtDistrito = $_POST['txtDistrito'];
$txtOcupacion = $_POST['txtOcupacion'];
$txtEmpresa = $_POST['txtEmpresa'];



$txtFoto = $_FILES['txtFoto']["name"];



$query = "UPDATE `users` SET Nivel='$txtNivel', Estado='$txtEstado', Nombre='$txtNombre', 
ApellidoP='$txtApellidoP', ApellidoM='$txtApellidoM', DNI='$txtDNI', Email='$txtEmail',
Telefono1='$txtTelefono1', Departamento='$txtDepartamento', Provincia='$txtProvincia', Distrito='$txtDistrito',
Ocupacion='$txtOcupacion', Empresa='$txtEmpresa'
WHERE id='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../userAlumno.php");
}
else{
    echo "Tenemos un Problema";
}



?>