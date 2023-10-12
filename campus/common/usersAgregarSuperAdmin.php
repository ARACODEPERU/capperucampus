<?php



$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNivel=(isset($_POST['txtNivel']))?$_POST['txtNivel']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidoP=(isset($_POST['txtApellidoP']))?$_POST['txtApellidoP']:"";
$txtApellidoM=(isset($_POST['txtApellidoM']))?$_POST['txtApellidoM']:"";
$txtDNI=(isset($_POST['txtDNI']))?$_POST['txtDNI']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtTelefono1=(isset($_POST['txtTelefono1']))?$_POST['txtTelefono1']:"";
$txtDepartamento=(isset($_POST['txtDepartamento']))?$_POST['txtDepartamento']:"";
$txtProvincia=(isset($_POST['txtProvincia']))?$_POST['txtProvincia']:"";
$txtDistrito=(isset($_POST['txtDistrito']))?$_POST['txtDistrito']:"";
$txtOcupacion=(isset($_POST['txtOcupacion']))?$_POST['txtOcupacion']:"";
$txtEmpresa=(isset($_POST['txtEmpresa']))?$_POST['txtEmpresa']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";


$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();


$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;



include ("common/conexion.php");

    switch($accion){
        case "btnAgregar":

            if($txtNivel==""){ 
                $error['Nivel']="Nivel del usuario";
            }

            if($txtEstado==""){ 
                $error['Estado']="Escribe Activo / Inactivo";
            }

            if($txtNombre==""){ 
                $error['Nombre']="Nombre del usuario";
            }

            if($txtApellidoP==""){ 
                $error['ApellidoP']="Apellido Paterno del usuario";
            }

            if($txtApellidoM==""){ 
                $error['ApellidoM']="Apellido Materno del usuario";
            }

            if($txtDNI==""){ 
                $error['DNI']="Escribe el DNI";
            }

            if($txtEmail==""){ 
                $error['Email']="Escribe el Email";
            }

            if($txtTelefono1==""){ 
                $error['Telefono1']="Telefono principal del usuario";
            }
            

            if($txtDepartamento==""){ 
                $error['Departamento']="Departamento";
            }
            
            if($txtProvincia==""){ 
                $error['Provincia']="Provincia";
            }
            
            if($txtDistrito==""){ 
                $error['Distrito']="Distrito";
            }

            
            if($txtOcupacion==""){ 
                $error['Ocupacion']="Ocupacion";
            }
            
            if($txtEmpresa==""){ 
                $error['Empresa']="Empresa";
            }

            if(count($error)>0){
                $mostrarModal=true;
                break;
            }



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

                move_uploaded_file($tmpFoto,"../img/users/".$nombreArchivo);
                
            }

            $sentencia->bindParam(':Foto',$nombreArchivo);
            $sentencia->execute();
            header('Location: userSuperAdmin.php');

        break;

        case "btnModificar":

            $sentencia=$pdo->prepare("UPDATE empleados  SET
            Nombre=:Nombre,
            ApellidoP=:ApellidoP,
            ApellidoM=:ApellidoM,
            Correo=:Correo WHERE
            id=:id");


            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':ApellidoP',$txtApellidoP);
            $sentencia->bindParam(':ApellidoM',$txtApellidoM);
            $sentencia->bindParam(':Correo',$txtCorreo);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();



            $Fecha= new DateTime();
            $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES['txtFoto']["name"]:"imagen.jpg";

            $tmpFoto=$_FILES['txtFoto']["tmp_name"];

            if($tmpFoto!=""){

                move_uploaded_file($tmpFoto,"../Imagenes/".$nombreArchivo);


                $sentencia=$pdo->prepare("SELECT Foto FROM empleados WHERE id=:id");
                $sentencia->bindParam(':id',$txtID);
                $sentencia->execute();
                $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
                print_r($empleado);
    
                if(isset($empleado["Foto"])){
                    if(file_exists("../Imagenes/".$empleado["Foto"])){

                                if($item['Foto']!="imagen.jpg"){
                                    unlink("../Imagenes/".$empleado["Foto"]);
                                }
                    }
                }



                $sentencia=$pdo->prepare("UPDATE empleados  SET Foto=:Foto WHERE id=:id");
                $sentencia->bindParam(':Foto',$nombreArchivo);
                $sentencia->bindParam(':id',$txtID);
                $sentencia->execute();
                
            }

            header('Location: index.php');

        break;

        case "btnEliminar":

            $sentencia=$pdo->prepare("SELECT Foto FROM productos WHERE id=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
            print_r($empleado);

            if(isset($empleado["Foto"])&&($item['Foto']!="imagen.jpg")){
                if(file_exists("../../images/products/".$empleado["Foto"])){
                    unlink("../../images/products/".$empleado["Foto"]);
                }
            }


            $sentencia=$pdo->prepare("DELETE FROM productos WHERE id=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();

            header('Location: index.php');


            echo "Presionaste btnEliminar";
        break;

        case "btnCancelar":
            
            header('Location: index.php');
        break;

    }
    //print_r($listaEmpleados);

?>
