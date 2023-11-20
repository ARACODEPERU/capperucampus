<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$nivel = $_POST['nivel'];
//$Foto=$_FILES['foto']["name"];
$ruta=$_POST['ruta'];
$Foto=generarStringAleatorio(10);



// Obtener la información del archivo
$archivo = $_FILES['foto'];
$infoArchivo = pathinfo($archivo["name"]);
// Obtener la extensión del archivo
$extension = $infoArchivo["extension"];
$Foto = $Foto .'.'.$extension;

//variables env para url
$envFile = $_SERVER['DOCUMENT_ROOT'] . '/.env';
$envVars = parse_ini_file($envFile);
$app_url = $envVars['APP_URL'];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$Foto
    );   
}
$Foto = $app_url."/img/users/".$Foto;
$query = "UPDATE `users` SET avatar='$Foto' WHERE id='$id'"; 
$resultado = $conexion->query($query);

$query = "SELECT person_id FROM users WHERE id ='$id'"; 
$resultado = $conexion->query($query);
$row = $resultado->fetch_assoc();
$personId = $row['person_id'];

$query = "UPDATE `people` SET image='$Foto' WHERE id='$personId'"; 
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