
<?php
    include ("conexion.php");
    session_start();
    if(isset($_SESSION['u_usuario'])){
    } 
    else
    {
        header ("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Habicom | Campus Virtual">
    <meta name="author" content="Habicom | Campus Virtual">
    <meta name="keyword" content="Habicom | Campus Virtual">
    <link rel="shortcut icon" type="image/x-icon" href="../img/clients/pragoticon.png">

    <title>Pragot | Campus Virtual</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--LightBox-->
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css" >
    <script src="js/lightbox-plus-jquery.min.js"  ></script>

    <!-- Custom styles for this template -->

    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
        <section id="container">
            <?php include ("common/menu.php") ?>
            <?php include ("common/headerDocente.php") ?>
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <br>
                    <!-- page start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading" style="background-color: #054261; color: #fff;">
                                    <div>
                                        <i class="fa fa-user" style="display: inline-block; margin-top: 5px;"></i> 
                                        <b> Lista de Docentes</b> || 
                                        <?php include ("conexion.php");
                                                $consulta = "SELECT count(*) as cuenta FROM users WHERE Nivel = 'Docente'";
                                                $resultado = $conexion->query($consulta);
                                                while($row = $resultado->fetch_assoc()){
                                            ?> 
                                                # <?php echo $row['cuenta'];?>
                                            <?php } ?>
                                    </div> 
                                    <div><a class="btn btn-success" data-toggle="modal" href="#myModal" style="display: inline-block; float: right; margin-top: -15px;"> <b><i class="fa fa-user" style="display: inline-block; margin-top: 5px;"></i> Agregar Docente + </b> </a></div>
                                </header>
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-user"></i> Foto</th>
                                            <th><i class="fa fa-user"></i> Docente</th>
                                            <th><i class="fa fa-bookmark"></i> DNI</th>
                                            <th><i class="fa fa-envelope"></i> Email</th>
                                            <th><i class="fa fa-phone"></i> Teléfono</th>
                                            <th><i class=" fa fa-edit"></i> Estado</th>
                                            <th><i class=" fa fa-edit"></i> Acción</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $consulta = "SELECT * FROM users WHERE Nivel='Docente' ORDER BY ID DESC";
                                            $resultado = $conexion->query($consulta);
                                            while($alumno = $resultado->fetch_assoc()){
                                        ?> 
                                        <tr>
                                            <td><img style="width: 50px; height: 50px; border-radius: 50%;" src="../img/users/<?php echo $alumno['Foto']; ?>"/></td>
                                            <td><?php echo $alumno['Nombre']; echo " "; echo $alumno['ApellidoP']; echo " "; echo $alumno['ApellidoM'];  ?></td>
                                            <td><?php echo $alumno['DNI']; ?></td>
                                            <td><?php echo $alumno['Email']; ?></td>
                                            <td><?php echo $alumno['Telefono']; ?></td>
                                            <td><span class="label label-success label-mini"><?php echo ($alumno['Activo']="Activo"); ?></span></td>
                                            <td>
                                                <a href="profile.php?id=<?php echo $alumno['ID'];?>" title="Ver Docente" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                                <a href="usersDocentesEditar.php?id=<?php echo $alumno['ID'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Editar</a>
                                                <a href="common/usersEliminarDocente.php?ID=<?php echo $alumno['ID'];?>" class="btn btn-danger btn"><i class="fa fa-trash-o "></i></a>
                                            </td>
                                        </tr>
                                        <?php  }  ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                    <!-- page end-->
                </section>
                    <!--footer start-->
                    <?php include ("common/footer.php"); ?>
                    <!--footer end-->
            </section>
            <!--main content end-->
        
            <!-- Modal -->
            <?php 
                $id = $_SESSION ['ID'];                                
                $consulta = "SELECT * FROM users WHERE ID='$id'";
                $resultado = $conexion->query($consulta);
                while($alumno = $resultado->fetch_assoc()){
            ?>
            <div class="modal fade " id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="form-row">    
                    <div class="modal-dialog">
                        <form  action="common/userAlumnoImg.php?id=<?php echo $alumno['ID']; ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #054261; color: #fff;">
                                    <h4 class="modal-title" style=" display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> Mi Foto| <b>Editar</b></h4>
                                    <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="nivel" required value="<?php echo $alumno['Nivel'] ?>">       
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4" style="text-align: center;">
                                            <img  width="100%" src="../img/users/<?php echo $alumno['Foto']; ?>" alt="">
                                        </div>
                                        <div class="form-group col-md-8"><br/>
                                            <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp"  name="foto">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                    <button  class="btn btn-success" type="submit" name="accion">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="form-row">    
                    <div class="modal-dialog">
                        <form  action="common/userAlumnoEdit.php?id=<?php echo $alumno['ID']; ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header"style="background-color: #054261; color: #fff;">
                                    <h4 class="modal-title" style="display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> Mi Perfil | <b>Editar</b></h4>
                                    <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="nivel" required value="<?php echo $alumno['Nivel'] ?>">        
                                            <input type="hidden" name="estado" required value="<?php echo $alumno['Estado'] ?>">        
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Nombre: *</label>
                                            <input type="text" class="form-control" name="nombre" value="<?php echo $alumno['Nombre'] ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>DNI: *</label>
                                            <input type="text" class="form-control" name="dni" value="<?php echo $alumno['DNI'] ?>" readonly>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Email:</label>
                                            <input type="text" class="form-control" name="email"  value="<?php echo $alumno['Email'] ?>" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Teléfono: *</label>
                                            <input type="text" class="form-control" name="telefono" value="<?php echo $alumno['Telefono'] ?>" required>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Profesión / Ocupacion: *</label>
                                            <input type="text" class="form-control" name="ocupacion" value="<?php echo $alumno['Ocupacion'] ?>">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Departamento: *</label>
                                            <select type="text" class="form-control" name="departamento">
                                                <option value="<?php echo $alumno['Departamento'] ?>"><?php echo $alumno['Departamento'] ?></option>
                                                <option>Amazonas</option>
                                                <option>Ancash</option>
                                                <option>Apurimac</option>
                                                <option>Arequipa</option>
                                                <option>Ayacucho</option>
                                                <option>Cajamarca</option>
                                                <option>Callao</option>
                                                <option>Cusco</option>
                                                <option>Huancavelica</option>
                                                <option>Huanuco</option>                                            
                                                <option>Ica</option>
                                                <option>Junin</option>
                                                <option>La Libertad</option>
                                                <option>Lambayeque</option>
                                                <option>Lima</option>
                                                <option>Loreto</option>
                                                <option>Madre De Dios</option>
                                                <option>Moquegua</option>
                                                <option>Pasco</option>
                                                <option>Piura</option>
                                                <option>Puno</option>
                                                <option>San Martin</option>                                            
                                                <option>Tacna</option>
                                                <option>Tumbes</option>
                                                <option>Ucayali</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Provincia: *</label>
                                            <input type="text" class="form-control" name="provincia" value="<?php echo $alumno['Provincia'] ?>" >
                                        </div>
                                        <div class="col-md-4">
                                            <label>Distrito *</label>
                                            <input type="text" class="form-control" name="distrito" value="<?php echo $alumno['Distrito'] ?>">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Me Presento: *</label>
                                            <textarea class="wysihtml5 form-control" rows="5"  name="presentacion" >
                                                <?php echo $alumno['Presentacion']; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                    <button  class="btn btn-success" type="submit" name="accion">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php  } ?>
            <!-- Modal -->

            <!-- Modal -->
            <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="form-row">    
                    <div class="modal-dialog">
                        <form  action="common/docentesGuardar.php" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #054261; color: #fff;">
                                    <h4 class="modal-title" style=" display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> Docente | <b>Agregar</b></h4>
                                    <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden"  name="nivel" required value="Docente">
                                            <input type="hidden"  name="estado" required value="Activo">        
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Nombre: *</label>
                                            <input type="text" class="form-control" name="nombre" require="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>DNI: *</label>
                                            <input type="text" class="form-control" name="dni" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Email: *</label>
                                            <input type="text" class="form-control" name="email" require="">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Teléfono: *</label>
                                            <input type="text" class="form-control" name="telefono" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Profesión / Ocupación: *</label>
                                            <input type="text" class="form-control" name="ocupacion" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Departamento: *</label>
                                            <select type="text" class="form-control" name="departamento" require="">
                                                <option>Seleccionar...</option>
                                                <option>Amazonas</option>
                                                <option>Ancash</option>
                                                <option>Apurimac</option>
                                                <option>Arequipa</option>
                                                <option>Ayacucho</option>
                                                <option>Cajamarca</option>
                                                <option>Callao</option>
                                                <option>Cusco</option>
                                                <option>Huancavelica</option>
                                                <option>Huanuco</option>
                                                <option>Ica</option>
                                                <option>Junin</option>
                                                <option>La Libertad</option>
                                                <option>Lambayeque</option>
                                                <option>Lima</option>
                                                <option>Loreto</option>
                                                <option>Madre De Dios</option>
                                                <option>Moquegua</option>
                                                <option>Pasco</option>
                                                <option>Piura</option>
                                                <option>Puno</option>
                                                <option>San Martin</option>
                                                <option>Tacna</option>
                                                <option>Tumbes</option>
                                                <option>Ucayali</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Provincia: *</label>
                                            <input type="text" class="form-control" name="provincia" require="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Distrito: *</label>
                                            <input type="text" class="form-control" name="distrito" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Foto:</label>
                                            <input  type="file" class="form-control" name="foto">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                    <button class="btn btn-success" type="submit">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal -->
        </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


    </body>
</html>