<?php
include("../../conexion.php");

$id =$_REQUEST['id'];
$Foto=$_FILES['foto']["name"];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../../img/courses/".$_FILES['foto']["name"]
    );   
}

$query = "UPDATE `courses` SET  FotoCourses='$Foto'
WHERE IDCourses='$id'"; 
$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../../coursesLista.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>