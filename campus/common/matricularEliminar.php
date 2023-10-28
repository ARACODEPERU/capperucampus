<?php
include ("../conexion.php");
$id = $_REQUEST['id'];
$p_id = $_REQUEST['p_id'];
$consulta = "DELETE FROM `aca_cap_registrations` WHERE  id='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header ("Location: ../matriUsuario.php?id=".$p_id);
}

else{
    echo "Tenemos un problema!!!";
}

?>