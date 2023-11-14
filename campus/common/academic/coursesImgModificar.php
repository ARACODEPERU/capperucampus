<?php
include("../../conexion.php");

$id =$_REQUEST['id'];
$Foto=generarStringAleatorio(10);
$archivo = $_FILES['foto'];

// Obtener la información del archivo
$infoArchivo = pathinfo($archivo["name"]);
// Obtener la extensión del archivo
$extension = $infoArchivo["extension"];
$Foto = $Foto .'.'.$extension;

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../../img/courses/".$Foto
    );   
}

$query = "UPDATE `aca_courses` SET  image='$Foto'
WHERE id='$id'"; 
$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../../coursesLista.php");
}
else{
    
    echo "Tenemos un Problema";
}


function generarStringAleatorio($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $cadenaAleatoria = '';

    for ($i = 0; $i < $longitud; $i++) {
        $indiceAleatorio = mt_rand(0, strlen($caracteres) - 1);
        $cadenaAleatoria .= $caracteres[$indiceAleatorio];
    }

    return $cadenaAleatoria;
}
?>