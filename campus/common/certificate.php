<?php
include ("../conexion.php");

$idUsers= $_POST['idUsers'];
$idCourses = $_POST['idCourses'];

$foto=generarStringAleatorio(11);
// Obtener la información del archivo
$archivo = $_FILES['foto'];
$link_pdf = '"'.$_POST['content'].'"';
$infoArchivo = pathinfo($archivo["name"]);
// Obtener la extensión del archivo
$extension = $infoArchivo["extension"];
$foto=$foto.".".$extension;

//variables env
$envFile = $_SERVER['DOCUMENT_ROOT'] . '/.env';
$envVars = parse_ini_file($envFile);
$app_url = $envVars['APP_URL'];


if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/certificate/".$foto
    );   
}
$foto = $app_url."/img/certificate/".$foto; //agrego ruta completa para usarla en la BD
$person_id;
$student_id;
    // Obtener el ID del estudiante y persona
    $consulta1 = "SELECT person_id from users where id='$idUsers'";
    $resultado1 = $conexion->query($consulta1);

    if ($resultado1) {
        $person_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $person_id = $person_id['person_id']; // Obtener el valor de la columna 'person_id'
    } else {
        throw new Exception("Error al obtener el ID de la persona");
    }

    $consulta1 = "SELECT id as student_id from aca_students where person_id='$person_id'";
    $resultado1 = $conexion->query($consulta1);

    if ($resultado1) {
        $student_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $student_id = $student_id['student_id']; // Obtener el valor de la columna 'person_id'
    } else {
        throw new Exception("Error al obtener el ID del estudiante");
    }


    // Obtener el ID del registro al curso
    $consulta1 = "SELECT id from aca_cap_registrations where course_id='$idCourses' and student_id='$student_id'";
    $resultado1 = $conexion->query($consulta1);
$registro_id;
    if ($resultado1) {
        $registro_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $registro_id = $registro_id['id']; // Obtener el valor de la columna 'person_id'
    } else {
        throw new Exception("Error al obtener el ID del registro en aca_cap_registrations");
    }

    $$resultado;

    if(substr($foto, -1) === "."){
        $query = "INSERT INTO aca_certificates(student_id, registration_id, course_id, content) 
                    VALUES ('$student_id','$registro_id', $idCourses, $link_pdf)";
                            $resultado = $conexion->query($query);        
    }else{
        $query = "INSERT INTO aca_certificates(student_id, registration_id, image, course_id, content) 
                    VALUES ('$student_id','$registro_id','$foto', $idCourses, $link_pdf)";
                            $resultado = $conexion->query($query);
    }



if($resultado){
    header ("Location: ../certificateUsuario.php?id=".$idUsers);
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