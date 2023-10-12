<?php
include ("../conexion.php");

$id =$_REQUEST['id'];
$Posicion = $_POST['posicion'];
$Nombre = $_POST['nombre'];
$Enlace = $_POST['enlace'];
$idThemes = $_POST['idThemes'];

$query ="UPDATE `files` SET PosicionFiles='$Posicion', NombreFiles='$Nombre', 
                    EnlaceFiles='$Enlace', idThemes='$idThemes'
        WHERE IDFiles='$id'"; 
$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    echo "Tenemos un Problema";
}

?>