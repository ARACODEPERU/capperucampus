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

$query = "UPDATE `aca_courses` SET 
                status='$Estado', 
                description='$Nombre', 
                category_id='$Categoria', 
                teacher_id='$idDocente', 
                course_day='$Dia', 
                course_month='$Mes', 
                course_year='$Year'
                WHERE id='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../../coursesLista.php");
}
else{
    echo "Tenemos un Problema";
}

?>