<?php
include ("../conexion.php");
$id = $_REQUEST['id'];
$consulta = "DELETE FROM `matriculas` WHERE  IDMatriculas='$id' ";
$resultado = $conexion->query($consulta);

if($resultado){
    header ("Location: ../matriListaAlumnos.php");
}

else{
    echo "Tenemos un problema!!!";
}

?>