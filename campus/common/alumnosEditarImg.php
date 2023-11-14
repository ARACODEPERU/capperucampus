<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$nivel = $_POST['nivel'];
//$Foto=$_FILES['foto']["name"];
$ruta=$_POST['ruta'];
$Foto=generarStringAleatorio(10);

$archivo = $_FILES['foto'];

// Obtener la información del archivo
$infoArchivo = pathinfo($archivo["name"]);
// Obtener la extensión del archivo
$extension = $infoArchivo["extension"];
$Foto = $Foto .'.'.$extension;

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$Foto
    );   
}
$query = "UPDATE `users` SET avatar='$Foto'
WHERE ID='$id'"; 
$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../".$ruta.$id);
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