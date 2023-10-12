
<?php
include ("../conexion.php");

$Posicion = $_POST['posicion'];
$Nombre = $_POST['nombre'];
$Enlace = $_POST['enlace'];
$idThemes = $_POST['idThemes'];

$query = "INSERT INTO files(PosicionFiles, NombreFiles, EnlaceFiles, idThemes) 
VALUES ('$Posicion','$Nombre','$Enlace','$idThemes')";
         $resultado = $conexion->query($query);
         if($resultado){
             header ("Location: ../coursesLista.php");
         }
         else{
             echo "Tenemos un Problema";
         }