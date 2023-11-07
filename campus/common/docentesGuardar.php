
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
$foto=$_FILES['foto']["name"];
$apellidoM = $nombres;
if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$_FILES['foto']["name"]
    );   
}// Iniciar la transacción
$conexion->begin_transaction();

try {
    // Crear el usuario
    $query = "INSERT INTO users (name, password, status, email, avatar) 
    VALUES ('$nombres', '$dni', 1,'$email','$foto')";
    $resultado = $conexion->query($query);

    if ($resultado) {
        $user_id = $conexion->insert_id;
    } else {
        throw new Exception("Error al crear el usuario");
    }

    // Crear la persona
    $query = "INSERT INTO people (names, father_lastname, mother_lastname, 
    number, email, telephone, ocupacion, presentacion, ubigeo) 
    VALUES ('$nombres','$apellidoP','$apellidoM','$dni','$email','$telefono','$ocupacion','Aqui...', '150101')";
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
    $consulta1 = "SELECT r.id role_id FROM roles r WHERE r.name = 'Docente'";
    $resultado1 = $conexion->query($consulta1);

    if ($resultado1) {
        $role_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $role_id = $role_id['role_id']; // Obtener el valor de la columna 'course_id'
    } else {
        throw new Exception("Error al obtener el ID del rol, ID rol: ", $role_id);
    }

    // Asignar rol al usuario
    $query = "INSERT INTO model_has_roles (role_id, model_type, model_id) 
    VALUES ('$role_id','App\Models\User','$user_id')";
    $resultado = $conexion->query($query);

    if (!$resultado) {
        throw new Exception("Error al asignar el rol al usuario");
    }

      // creando aca_teacher
      $query = "INSERT INTO aca_teachers (teacher_code, person_id) 
      VALUES ('$dni',$person_id)";
      $resultado = $conexion->query($query);
  
      if (!$resultado) {
          throw new Exception("Error al registrar en aca_teacher");
      }

    // Confirmar la transacción si todas las consultas se ejecutan correctamente
    $conexion->commit();
    header ("Location: ../usersDocentes.php");
} catch (Exception $e) {
    // Revertir la transacción si ocurre algún error
    $conexion->rollback();
    echo "Error en la transacción: " . $e->getMessage();
}



?>