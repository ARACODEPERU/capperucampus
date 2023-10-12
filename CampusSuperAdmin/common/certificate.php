<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtidUsers=(isset($_POST['txtidUsers']))?$_POST['txtidUsers']:"";
$txtidCourses=(isset($_POST['txtidCourses']))?$_POST['txtidCourses']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$error=array();


$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("common/conexion.php");

    switch($accion){
        case "btnAgregar":

            if($txtidUsers==""){ 
                $error['Usuario']="ID de Usuario";
            }

            if($txtidCourses==""){ 
                $error['Cursos']="ID de Curso";
            }

            if(count($error)>0){
                $mostrarModal=true;
                break;
            }

            $sentencia=$pdo->prepare("INSERT INTO certificado (idUsers, idCourses, Foto) 
            VALUES (:idUsers, :idCourses, :Foto)");

            $sentencia->bindParam(':idUsers',$txtidUsers);
            $sentencia->bindParam(':idCourses',$txtidCourses);

            $Fecha= new DateTime();
            $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES['txtFoto']["name"]:"imagen.jpg";

            $tmpFoto=$_FILES['txtFoto']["tmp_name"];

            if($tmpFoto!=""){

                move_uploaded_file($tmpFoto,"../img/certificate/".$nombreArchivo);
                
            }

            $sentencia->bindParam(':Foto',$nombreArchivo);
            $sentencia->execute();
            header('Location: certificateListaUsers.php');

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
