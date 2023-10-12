<?php
include("../../conexion.php");

$id =$_REQUEST['id'];
$Estado = $_POST['Estado'];
$Nombre = $_POST['Nombre'];
$Categoria = $_POST['Categoria'];
$idDocente = $_POST['idDocente'];
$Dia = $_POST['Dia'];
$Mes = $_POST['Mes'];
$Year = $_POST['Year'];

//$txtFoto = $_FILES['txtFoto']["name"];

$query = "UPDATE `courses` SET 
                Estado='$Estado', 
                NombreCourses='$Nombre', 
                CategoriaCourses='$Categoria', 
                idDocente='$idDocente', 
                diaCourses='$Dia', 
                mesCourses='$Mes', 
                yearCourses='$Year'
                WHERE IDCourses='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../../coursesLista.php");
}
else{
    echo "Tenemos un Problema";
}

?>