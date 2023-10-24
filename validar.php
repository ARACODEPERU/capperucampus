<?php 

session_start();
$usuario=$_POST['userEmail'];
$contrasena=$_POST['userPass'];



include ("conexion.php");

$proceso=$conexion->query("SELECT p.number dni, u.status estado, u.id FROM users u JOIN people p ON u.person_id = p.id WHERE u.email='$usuario' AND p.number='$contrasena'" );



if (mysqli_num_rows($proceso) == 1){

	while($resultado = mysqli_fetch_array($proceso)){
		$nivel_rol="";
		$id = $resultado['id'];
			$nivel=$conexion->query("SELECT name FROM model_has_roles mhr JOIN roles r ON mhr.role_id = r.id WHERE mhr.model_id = '$id'");
				if(mysqli_num_rows($nivel) >= 1){
						while($resultado2 = mysqli_fetch_array($nivel)){
							$nivel_rol = $resultado2['name'];
					}
			}

			
		session_start();
		$status;
		if($resultado['estado']) $status = 'Activo';
		if($nivel_rol=="admin")$nivel_rol="Administrador";
		$_SESSION['ID'] = $id;
		$_SESSION['Estado'] = $status;
		$_SESSION['Nivel'] = $nivel_rol;
		$_SESSION['DNI'] = $resultado['dni'];
		$_SESSION['Email'] = $usuario;
	

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
