<?php
include("../conexion.php");
$id = $_REQUEST['id'];
$consulta = "DELETE FROM `videos` WHERE  IDVideos='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header("Location: ../coursesLista.php");
}

else{
    echo "Tenemos un problema!!!";
}

?>