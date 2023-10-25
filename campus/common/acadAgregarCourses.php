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

$query = "INSERT INTO aca_courses(status, description, category_id, teacher_id, image) 
VALUES (1,'$Nombre','$Categoria','$idDocente','$Foto')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>

