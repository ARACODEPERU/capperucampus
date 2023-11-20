
<?php
include ("../conexion.php");

$nivel = $_POST['nivel'];
$estado = $_POST['estado'];
$nombres = $_POST['nombres'];
$apellidoP = $_POST['ApellidoP'];
$apellidoM = $_POST['ApellidoM'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$ocupacion= $_POST['ocupacion'];
$email = $_POST['email'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distrito'];
$Foto=generarStringAleatorio(10);
$archivo = $_FILES['foto'];

// Obtener la información del archivo
$infoArchivo = pathinfo($archivo["name"]);
// Obtener la extensión del archivo
$extension = $infoArchivo["extension"];
$Foto = $Foto .'.'.$extension;

//variables env
$envFile = $_SERVER['DOCUMENT_ROOT'] . '/.env';
$envVars = parse_ini_file($envFile);
$app_url = $envVars['APP_URL'];




if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$Foto
    );   
}// Iniciar la transacción
$conexion->begin_transaction();
$Foto = $app_url."/img/users/".$Foto;
try {
    // Crear el usuario
    $query = "INSERT INTO users (name, password, status, email, avatar) 
    VALUES ('$nombres', '$dni', 1,'$email','$Foto')";
    $resultado = $conexion->query($query);

    if ($resultado) {
        $user_id = $conexion->insert_id;
    } else {
        throw new Exception("Error al crear el usuario");
    }

    // Crear la persona
    $query = "INSERT INTO people (names, father_lastname, mother_lastname, 
    number, email, telephone, ocupacion, presentacion, ubigeo, image) 
    VALUES ('$nombres','$apellidoP','$apellidoM','$dni','$email','$telefono','$ocupacion','Aqui...', '150101', '$Foto')";
    $resultado = $conexion->query($query);

    if ($resultado) {
        $person_id = $conexion->insert_id;
    } else {
        throw new Exception("Error al crear la persona");
    }

    // Enlazar usuario con persona
    $query = "UPDATE `users` SET  person_id='$person_id' where id = '$user_id'";
    $resultado = $conexion->query($query);

    if (!$resultado) {
        throw new Exception("Error al enlazar usuario con persona");
    }

    // Obtener el ID del rol DOCENTE
    $consulta1 = "SELECT r.id role_id FROM roles r WHERE r.name = 'Alumno'";
    $resultado1 = $conexion->query($consulta1);

    if ($resultado1) {
        $role_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $role_id = $role_id['role_id']; // Obtener el valor de la columna 'id'
    } else {
        throw new Exception("Error al obtener el ID del rol");
    }

    // Asignar rol al usuario
    $query = "INSERT INTO model_has_roles (role_id, model_type, model_id) 
    VALUES ('$role_id','App\Models\User','$user_id')";
    $resultado = $conexion->query($query);

    if (!$resultado) {
        throw new Exception("Error al asignar el rol al usuario");
    }

      // registrando en aca_students
      $query = "INSERT INTO aca_students (student_code, person_id) 
      VALUES ('$dni','$person_id')";
      $resultado = $conexion->query($query);
  
      if (!$resultado) {
          throw new Exception("Error al registrar en aca_students");
      }


    // Confirmar la transacción si todas las consultas se ejecutan correctamente
    $conexion->commit();
    header ("Location: ../usersAlumnos.php");
} catch (Exception $e) {
    // Revertir la transacción si ocurre algún error
    $conexion->rollback();
    echo "Error en la transacción: " . $e->getMessage();
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