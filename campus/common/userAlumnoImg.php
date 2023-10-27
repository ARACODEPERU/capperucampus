<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$nivel = $_POST['nivel'];
$foto=$_FILES['foto']["name"];
$ruta=$_POST['ruta'];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$_FILES['foto']["name"]
    );   
}
//SET Nivel='$nivel',
$query = "UPDATE `users` set avatar='$foto'
WHERE id='$id'"; 
$resultado = $conexion->query($query);

if($resultado){  
    header ("Location: ../".$ruta.$id);
}
else{
    
    echo "Tenemos un Problema";
}

?>