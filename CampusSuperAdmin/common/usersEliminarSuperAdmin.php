<?php
include("../conexion.php");
$id = $_REQUEST['ID'];
$consulta = "DELETE FROM `users` WHERE  ID='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header("Location: ../userSuperAdmin.php");
}

else{
    echo "Tenemos un problema!!!";
}

?>