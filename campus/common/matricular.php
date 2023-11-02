<?php

include("../conexion.php");
$idUsers = $_POST['idUsers'];
$estado = $_POST['estado'];
$idCourses = $_POST['idCourses'];

$student_id; 
$p_id; //obtenemos el id de estudiante y de persona


$consul = "Select u.person_id p_id from users u where u.id='$idUsers'";
$resul = $conexion->query($consul);
if($resul){
    $p_id = $resul->fetch_assoc(); // Obtener los datos del resultado
    $p_id = $p_id['p_id']; // Obtener el valor de la columna 'course_id'
}


$consulta1 = "SELECT st.id student_id FROM users u join people p on p.id = u.person_id join aca_students st on st.person_id=p.id WHERE u.id='$idUsers'";
$resultado1 = $conexion->query($consulta1);


if ($resultado1) {
    $student_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
    $student_id = $student_id['student_id']; // Obtener el valor de la columna 'course_id'
}else{ //si no existe como estudiante se registra como uno
    $consulta1 = "SELECT student_code from aca_students order by id desc limit 1";
    $resultado1 = $conexion->query($consulta1);
    $student_code;
    $student_id;
    if ($resultado1) {
        $student_code = $resultado1->fetch_assoc(); // Obtener los datos del resultado
        $student_code = $student_code['student_code']; // Obtener el valor
        $student_code += (int) $student_code+1; //sumo uno para nuevo codigo
        $query = "INSERT INTO aca_students (student_code, person_id) 
            VALUES ('$student_code', '$p_id')";
        $resultado = $conexion->query($query);
        $student_id=$conexion->id;
    }else{
        $query = "INSERT INTO aca_students (student_code, person_id) 
            VALUES ('4300', '$p_id')";
        $resultado = $conexion->query($query);
        $student_id=$conexion->id;
    }
}

//ahora registramos la matricula

$query = "INSERT INTO aca_cap_registrations (student_id, course_id, status) 
            VALUES ('$student_id', '$idCourses', 1)";
$resultado = $conexion->query($query);

if($resultado){
    echo header ("Location: ../matriUsuario.php?id=".$idUsers);
}
else{
    echo "OH NOOOOO!!";
}

?>