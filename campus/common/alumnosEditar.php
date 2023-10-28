<?php
include ("../conexion.php");

$id =$_REQUEST['id'];
$Nivel = $_POST['nivel'];
$Estado = $_POST['estado'];
$Nombre = $_POST['nombre'];
$ApellidoP = $_POST['ApellidoP'];
$ApellidoM = $_POST['ApellidoM'];
$DNI = $_POST['dni'];
$Email = $_POST['email'];
$Telefono = $_POST['telefono'];
$Departamento = $_POST['departamento'];
$Provincia = $_POST['provincia'];
$Distrito = $_POST['distrito'];
$Ocupacion = $_POST['ocupacion'];
$Presentacion = $_POST['presentacion'];
$ruta = $_POST['ruta'];


$consulta1 = "SELECT p.id p_id FROM users u join people p on p.id = u.person_id WHERE u.id='$id'";
$resultado1 = $conexion->query($consulta1);
$person_id;
if ($resultado1) {
    $person_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
    $person_id = $person_id['p_id']; // Obtener el valor de la columna 'course_id'
}

$query = "UPDATE `users` SET  status='$Estado' where id = '$id'";
$resultado = $conexion->query($query);

$query = "UPDATE  `people` SET  names='$Nombre', 
father_lastname='$ApellidoP', mother_lastname='$ApellidoM', number='$DNI', email='$Email',
telephone='$Telefono', ocupacion='$Ocupacion', presentacion='$Presentacion'
WHERE id='$person_id'"; 

$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../".$ruta.$id);
}
else{
    echo "Tenemos un Problema";
}


?>