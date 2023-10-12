<?php 

session_start();
$usuario=$_POST['userEmail'];
$contrasena=$_POST['userPass'];



include ("conexion.php");

$proceso=$conexion->query("SELECT * FROM users JOIN people ON users.person_id = people.id WHERE users.Email='$usuario' AND people.number='$contrasena'" );

if (mysqli_num_rows($proceso) == 1){

	while($resultado = mysqli_fetch_array($proceso)){

		session_start();
		$_SESSION['ID'] = 1; //$resultado['ID'];
		$_SESSION['Estado'] = true; //= $resultado['Activo'];
		$_SESSION['Nivel'] = 'Alumno'; //$resultado['Nivel'];
		$_SESSION['DNI'] = '12345678'; //$resultado['DNI'];
		$_SESSION['Email'] = 'asd@asdas.com';//$resultado['Email'];
		

		if ($_SESSION['Nivel'] == 'Alumno' ||
			$_SESSION['Nivel'] == 'Ejecutiva' ||
			$_SESSION['Nivel'] == 'Administrador' ||
			$_SESSION['Nivel'] == 'SuperAdmin' ){

			$_SESSION['u_usuario'] = $usuario;
			
			header("Location: campus/index.php");

		}else{
			header("Location: index.php");
		}

	}
	

} else{
    header("Location: index.php");
}


?>
