<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$nivel = $_POST['nivel'];
$foto=$_FILES['foto']["name"];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$_FILES['foto']["name"]
    );   
}
$query = "UPDATE `users` SET Nivel='$nivel', Foto='$foto'
WHERE ID='$id'"; 
$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../usersAlumnos.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>