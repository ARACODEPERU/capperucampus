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
    header ("Location: ../userAdministrador.php");
}
else{
    echo "Tenemos un Problema";
}

/*
$sentencia=$pdo->prepare("INSERT INTO users(Nivel, Estado, Nombre, ApellidoP, ApellidoM, DNI, 
Email, Telefono1,
Departamento, Provincia, Distrito,
Ocupacion, Empresa, Foto) 
VALUES (:Nivel, :Estado, :Nombre, :ApellidoP, :ApellidoM, :DNI, 
:Email, :Telefono1, 
:Departamento, :Provincia, :Distrito, :Ocupacion, :Empresa, :Foto)");

$sentencia->bindParam(':Nivel',$txtNivel);
$sentencia->bindParam(':Estado',$txtEstado);
$sentencia->bindParam(':Nombre',$txtNombre);
$sentencia->bindParam(':ApellidoP',$txtApellidoP);
$sentencia->bindParam(':ApellidoM',$txtApellidoM);
$sentencia->bindParam(':DNI',$txtDNI);
$sentencia->bindParam(':Email',$txtEmail);
$sentencia->bindParam(':Telefono1',$txtTelefono1);
$sentencia->bindParam(':Departamento',$txtDepartamento);
$sentencia->bindParam(':Provincia',$txtProvincia);
$sentencia->bindParam(':Distrito',$txtDistrito);
$sentencia->bindParam(':Ocupacion',$txtOcupacion);
$sentencia->bindParam(':Empresa',$txtEmpresa);

$Fecha= new DateTime();
$nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES['txtFoto']["name"]:"imagen.jpg";

$tmpFoto=$_FILES['txtFoto']["tmp_name"];

if($tmpFoto!=""){

    move_uploaded_file($tmpFoto,"../../img/users/".$nombreArchivo);
    
}

$sentencia->bindParam(':Foto',$nombreArchivo);
$sentencia->execute();
header('Location: ../index.php');


*/


?>