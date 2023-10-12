<?php
include ("../conexion.php");

$idUsers= $_POST['idUsers'];
$idCourses = $_POST['idCourses'];
$foto=$_FILES['foto']["name"];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/certificate/".$_FILES['foto']["name"]
    );   
}
$query = "INSERT INTO certificado(idUsers, idCourses, Foto) 
VALUES ('$idUsers','$idCourses','$foto')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../matriListaCourses.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>