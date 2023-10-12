<?php
include ("../conexion.php");
$id = $_REQUEST['id'];
$consulta = "DELETE FROM `users` WHERE  ID='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header ("Location: ../usersAlumnos.php");
}

else{
    echo "Tenemos un problema!!!";
}

?>