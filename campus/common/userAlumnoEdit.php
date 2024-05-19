<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$Nivel = $_POST['nivel'];
$Estado = $_POST['estado'];
$Nombre = trim($_POST['nombre']);
$DNI = trim($_POST['dni']);
$Email = $_POST['email'];
$Telefono = $_POST['telefono'];
$Departamento = $_POST['departamento'];
$Provincia = $_POST['provincia'];
$Distrito = $_POST['distrito'];
$Ocupacion = $_POST['ocupacion'];
$Presentacion = $_POST['presentacion'];

$consulta1 = "SELECT p.id p_id FROM users u join people p on p.id = u.person_id WHERE u.id='$id'";
$resultado1 = $conexion->query($consulta1);
$person_id;
if ($resultado1) {
    $person_id = $resultado1->fetch_assoc(); // Obtener los datos del resultado
    $person_id = $person_id['p_id']; // Obtener el valor de la columna 'course_id'
}

$query = "UPDATE people set names='$Nombre', number='$DNI', email='$Email', telephone='$Telefono', ocupacion='$Ocupacion', presentacion='$Presentacion'
WHERE id='$person_id'";
$resultado = $conexion->query($query);


// $query = "UPDATE `users` SET Nivel='$Nivel', Estado='$Estado', Nombre='$Nombre', DNI='$DNI', Email='$Email',
// Telefono='$Telefono', Departamento='$Departamento', Provincia='$Provincia', Distrito='$Distrito',
// Ocupacion='$Ocupacion', Presentacion='$Presentacion'
// WHERE id='$id'"; 

// $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../profile.php?id=".$id);
}
else{
    echo "Tenemos un Problema";
}

/*
$sentencia=$pdo->prepare("INSERT INTO users(Nivel, Estado, Nombre, ApellidoP, ApellidoM, DNI, 
Email, Telefono1,
Departamento, Provincia, Distrito,
Ocupacion, Empresa, Foto) 
VALUES (:Nivel, :Estado, :Nombre, :ApellidoP, :ApellidoM, :DNI, 
:Email, :Telefono1, 
:Departamento, :Provincia, :Distrito, :Ocupacion, :Empresa, :Foto)");

$sentencia->bindParam(':Nivel',$txtNivel);
$sentencia->bindParam(':Estado',$txtEstado);
$sentencia->bindParam(':Nombre',$txtNombre);
$sentencia->bindParam(':ApellidoP',$txtApellidoP);
$sentencia->bindParam(':ApellidoM',$txtApellidoM);
$sentencia->bindParam(':DNI',$txtDNI);
$sentencia->bindParam(':Email',$txtEmail);
$sentencia->bindParam(':Telefono1',$txtTelefono1);
$sentencia->bindParam(':Departamento',$txtDepartamento);
$sentencia->bindParam(':Provincia',$txtProvincia);
$sentencia->bindParam(':Distrito',$txtDistrito);
$sentencia->bindParam(':Ocupacion',$txtOcupacion);
$sentencia->bindParam(':Empresa',$txtEmpresa);

$Fecha= new DateTime();
$nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES['txtFoto']["name"]:"imagen.jpg";

$tmpFoto=$_FILES['txtFoto']["tmp_name"];

if($tmpFoto!=""){

    move_uploaded_file($tmpFoto,"../../img/users/".$nombreArchivo);
    
}

$sentencia->bindParam(':Foto',$nombreArchivo);
$sentencia->execute();
header('Location: ../index.php');


*/


?>