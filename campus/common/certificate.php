<?php
include ("../conexion.php");

$idUsers= $_POST['idUsers'];
$idCourses = $_POST['idCourses'];
$foto=$_FILES['foto']["name"];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/certificate/".$_FILES['foto']["name"]
    );   
}
$person_id;
$student_id;
    // Obtener el ID del estudiante y persona
    $consulta1 = "SELECT person_id from users where id='$idUsers'";
    $resultado1 = $conexion->query($consulta1);

    if ($resultado1) {
        $person_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $person_id = $person_id['person_id']; // Obtener el valor de la columna 'person_id'
    } else {
        throw new Exception("Error al obtener el ID de la persona");
    }

    $consulta1 = "SELECT id as student_id from aca_students where person_id='$person_id'";
    $resultado1 = $conexion->query($consulta1);

    if ($resultado1) {
        $student_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $student_id = $student_id['student_id']; // Obtener el valor de la columna 'person_id'
    } else {
        throw new Exception("Error al obtener el ID del estudiante");
    }


    // Obtener el ID del registro al curso
    $consulta1 = "SELECT id from aca_cap_registrations where course_id='$idCourses' and student_id='$student_id'";
    $resultado1 = $conexion->query($consulta1);
$registro_id;
    if ($resultado1) {
        $registro_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $registro_id = $registro_id['id']; // Obtener el valor de la columna 'person_id'
    } else {
        throw new Exception("Error al obtener el ID del registro en aca_cap_registrations");
    }


$query = "INSERT INTO aca_certificates(student_id, registration_id, image, course_id) 
VALUES ('$student_id','$registro_id','$foto', $idCourses)";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../matriListaCourses.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>