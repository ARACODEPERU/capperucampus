<?php
include ("../conexion.php");

$Estado = $_POST['Estado'];
$Nombre = $_POST['NombreCourses'];
$Categoria = $_POST['CategoriaCourses'];
$idDocente = $_POST['idDocente'];
$Foto=$_FILES['foto']["name"];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/courses/".$_FILES['foto']["name"]
    );   
}


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



$query = "INSERT INTO aca_courses(status, description, category_id, teacher_id, image) 
VALUES (1,'$Nombre','$Categoria','$teacher_id','$Foto')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>

