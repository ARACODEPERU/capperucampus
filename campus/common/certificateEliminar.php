<?php
include ("../conexion.php");
$id = $_REQUEST['id'];
$user_id = $_REQUEST['user_id'];
$consulta = "DELETE FROM `aca_certificates` WHERE  id='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header ("Location: ../certificateUsuario.php?id=".$user_id);
}

else{
    echo "Tenemos un problema!!!";
}

?>