
<?php
include ("../conexion.php");

$nivel = $_POST['nivel'];
$estado = $_POST['estado'];
$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$ocupacion= $_POST['ocupacion'];
$email = $_POST['email'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distrito'];
$foto=$_FILES['foto']["name"];

if(isset($_FILES['foto'])){
    move_uploaded_file($_FILES['foto']["tmp_name"],"../../img/users/".$_FILES['foto']["name"]
    );   
}
$query = "INSERT INTO users(Nivel, Estado, Nombre, ApellidoP, ApellidoM, 
                            DNI, Email, Telefono,  Ocupacion, 
                            Departamento, Provincia, Distrito, Foto) 
VALUES ('$nivel','$estado','$nombre','$apellidoP','$apellidoM',
        '$dni','$email','$telefono','$ocupacion',
        '$departamento','$provincia','$distrito','$foto')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../usersAlumnos.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>