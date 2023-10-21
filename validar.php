<?php 

session_start();
$usuario=$_POST['userEmail'];
$contrasena=$_POST['userPass'];



include ("conexion.php");

$proceso=$conexion->query("SELECT * FROM users JOIN people ON users.person_id = people.id WHERE users.email='$usuario' AND people.number='$contrasena'" );



if (mysqli_num_rows($proceso) == 1){

	while($resultado = mysqli_fetch_array($proceso)){

		$id = $resultado['id'];
			$nivel=$conexion->query("SELECT NAME FROM model_has_roles JOIN roles ON role_id = roles.id WHERE model_id = '$id'");
				if(mysqli_num_rows($nivel) >= 1){
						while($resultado = mysqli_fetch_array($nivel)){
							$nivel_rol = $resultado['NAME'];
					}
			}

		session_start();
		if($nivel_rol=="admin")$nivel_rol="Administrador";
		$_SESSION['ID'] = 1; //$resultado['ID'];
		$_SESSION['Estado'] = "Activo"; //= $resultado['Activo'];
		$_SESSION['Nivel'] = 'Administrador'; //$resultado['Nivel'];
		$_SESSION['DNI'] = $resultado['number'];
		$_SESSION['Email'] = 'admin@asdas.com';//$resultado['email'];
		

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
    header("Location: ".$usuario."index.php");
}


?>
