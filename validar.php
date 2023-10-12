<?php 

session_start();
$usuario=$_POST['userEmail'];
$contrasena=$_POST['userPass'];



include ("conexion.php");

$proceso=$conexion->query("SELECT * FROM users WHERE Email='$usuario' AND DNI='$contrasena' AND Estado = 'Activo'" );

if (mysqli_num_rows($proceso) == 1){

	while($resultado = mysqli_fetch_array($proceso)){

		session_start();
		$_SESSION['ID'] = $resultado['ID'];
		$_SESSION['Estado'] = $resultado['Activo'];
		$_SESSION['Nivel'] = $resultado['Nivel'];
		$_SESSION['DNI'] = $resultado['DNI'];
		$_SESSION['Email'] = $resultado['Email'];
		

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
