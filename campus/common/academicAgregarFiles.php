
<?php
include ("../conexion.php");

$Posicion = $_POST['posicion'];
$Nombre = $_POST['nombre'];
$Enlace = $_POST['enlace'];
$idThemes = $_POST['idThemes'];

$query = "INSERT INTO aca_contents(position, description, content, theme_id, is_file) 
VALUES ('$Posicion','$Nombre','$Enlace','$idThemes', 1)";
         $resultado = $conexion->query($query);
         if($resultado){
             header ("Location: ../filesLista.php?id=".$idThemes);
         }
         else{
             echo "Tenemos un Problema";
         }