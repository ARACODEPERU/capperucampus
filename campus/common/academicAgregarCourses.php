<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$txtidDocente=(isset($_POST['txtidDocente']))?$_POST['txtidDocente']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$error=array();


$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("common/conexion.php");

    switch($accion){
        case "btnAgregar":

            if($txtEstado==""){ 
                $error['Estado']="Estado del curso";
            }

            if($txtNombre==""){ 
                $error['Nombre']="Nombre del curso";
            }

            if($txtCategoria==""){ 
                $error['Categoria']="Categoria del Curso";
            }

            if($txtidDocente==""){ 
                $error['idDocente']="ID del Docente";
            }

            if(count($error)>0){
                $mostrarModal=true;
                break;
            }

            $sentencia=$pdo->prepare("INSERT INTO courses(Estado, NombreCourses, CategoriaCourses, idDocente, FotoCourses) 
            VALUES (:Estado, :Nombre, :Categoria, :idDocente, :Foto)");

            $sentencia->bindParam(':Estado',$txtEstado);
            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':Categoria',$txtCategoria);
            $sentencia->bindParam(':idDocente',$txtidDocente);

            $Fecha= new DateTime();
            $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES['txtFoto']["name"]:"imagen.jpg";

            $tmpFoto=$_FILES['txtFoto']["tmp_name"];

            if($tmpFoto!=""){

                move_uploaded_file($tmpFoto,"../img/courses/".$nombreArchivo);
                
            }

            $sentencia->bindParam(':Foto',$nombreArchivo);
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
