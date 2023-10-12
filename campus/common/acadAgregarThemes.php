<?php
include ("../conexion.php");

$Posicion = $_POST['PosicionThemes'];
$idModules = $_POST['idModules'];
$Nombre = $_POST['NombreThemes'];

$query = "INSERT INTO themes(PosicionThemes, idModules, NombreThemes) 
VALUES ('$Posicion','$idModules','$Nombre')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>