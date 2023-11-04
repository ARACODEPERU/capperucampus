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

// Obtener el ID del teacher
$consulta1 = "SELECT t.id as teacher_id from users u join people p on p.id=u.person_id join aca_teachers t on t.person_id=p.id where u.id='$idDocente'";
$resultado1 = $conexion->query($consulta1);
$teacher_id;
if ($resultado1) {
    $teacher_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
    $teacher_id = $teacher_id['teacher_id']; // Obtener el valor de la columna 'course_id'
} else {
    throw new Exception("Error al obtener el ID del rol");
}

$query = "UPDATE `aca_courses` SET 
                status='$Estado', 
                description='$Nombre', 
                category_id='$Categoria', 
                teacher_id='$teacher_id', 
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