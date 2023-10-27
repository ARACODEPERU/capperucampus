<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$nivel = $_POST['nivel'];
$foto=$_FILES['foto']["name"];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$_FILES['foto']["name"]
    );   
}
//SET Nivel='$nivel',
$query = "UPDATE `users`  avatar='$foto'
WHERE id='$id'"; 
$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../index.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>