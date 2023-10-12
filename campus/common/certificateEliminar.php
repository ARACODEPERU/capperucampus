<?php
include ("../conexion.php");
$id = $_REQUEST['id'];
$consulta = "DELETE FROM `certificado` WHERE  IDCertificate='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header ("Location: ../matriListaCourses.php");
}

else{
    echo "Tenemos un problema!!!";
}

?>