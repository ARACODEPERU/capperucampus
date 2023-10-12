<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtPosicion=(isset($_POST['txtPosicion']))?$_POST['txtPosicion']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtEnlace=(isset($_POST['txtEnlace']))?$_POST['txtEnlace']:"";
$txtidThemes=(isset($_POST['txtidThemes']))?$_POST['txtidThemes']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$error=array();


$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("common/conexion.php");

    switch($accion){
        case "btnAgregar":

            if($txtPosicion==""){ 
                $error['Posicion']="Ingresar la Posicion";
            }

            if($txtNombre==""){ 
                $error['Nombre']="Escribir titulo del archivo";
            }

            if($txtEnlace==""){ 
                $error['Enlace']="Ingresar el Enlace";
            }

            if($txtidThemes==""){ 
                $error['Themes']="Ingresar id del tema al que pertenece";
            }


            if(count($error)>0){
                $mostrarModal=true;
                break;
            }

            $sentencia=$pdo->prepare("INSERT INTO files(PosicionFiles, idThemes, NombreFiles, EnlaceFiles) 
            VALUES (:Posicion, :idThemes, :Nombre, :Enlace)");

            $sentencia->bindParam(':Posicion',$txtPosicion);
            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':Enlace',$txtEnlace);
            $sentencia->bindParam(':idThemes',$txtidThemes);

            $Fecha= new DateTime();
           
            $sentencia->execute();
            header('Location: coursesLista.php');

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
