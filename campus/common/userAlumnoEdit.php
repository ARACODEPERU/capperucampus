<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$Nivel = $_POST['nivel'];
$Estado = $_POST['estado'];
$Nombre = $_POST['nombre'];
$DNI = $_POST['dni'];
$Email = $_POST['email'];
$Telefono = $_POST['telefono'];
$Departamento = $_POST['departamento'];
$Provincia = $_POST['provincia'];
$Distrito = $_POST['distrito'];
$Ocupacion = $_POST['ocupacion'];
$Presentacion = $_POST['presentacion'];


$query = "UPDATE `users` SET Nivel='$Nivel', Estado='$Estado', Nombre='$Nombre', DNI='$DNI', Email='$Email',
Telefono='$Telefono', Departamento='$Departamento', Provincia='$Provincia', Distrito='$Distrito',
Ocupacion='$Ocupacion', Presentacion='$Presentacion'
WHERE id='$id'"; 

$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../index.php");
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