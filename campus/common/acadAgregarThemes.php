<?php
include ("../conexion.php");

$Posicion = $_POST['PosicionThemes'];
$idModules = $_POST['idModules'];
$Nombre = $_POST['NombreThemes'];

$query = "INSERT INTO aca_themes(position, module_id, description) 
VALUES ('$Posicion','$idModules','$Nombre')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../themesLista.php?id=".$idModules);
}
else{
    
    echo "Tenemos un Problema";
}

?>