<?php
include("../conexion.php");
$id = $_REQUEST['id'];
$theme_id = $_REQUEST['theme_id'];
$consulta = "DELETE FROM `aca_contents` WHERE  id='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header("Location: ../filesLista.php?id=".$theme_id);
}

else{
    echo "Tenemos un problema!!!";
}

?>