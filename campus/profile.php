<?php 
require 'common/usersAgregar.php'; 
?> 



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
        <?php include ("common/header.php") ?>

        <!--main content start-->
        <?php $id = $_REQUEST ['id'];
        $sentencia= $pdo->prepare("SELECT u.status Estado, u.avatar Foto, p.names Nombre, p.email Email, r.name Nivel, p.number DNI, p.telephone Telefono,
        p.ocupacion Ocupacion, p.presentacion Presentacion, dis.name Distrito, pro.name Provincia, dep.name Departamento, u.id ID
        FROM users u join people p on p.id = u.person_id join model_has_roles mhr on mhr.model_id = u.id join roles r on mhr.role_id = r.id
        join districts dis on dis.id = p.ubigeo join provinces pro on pro.id = dis.province_id join departments dep on dep.id = pro.department_id
        WHERE u.id ='$id'");
        $sentencia->execute();
        $listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaUsuarios as $usuario) {  ?>     
            <section id="main-content">
                <section class="wrapper">
                    <br/>
                    <!-- page start-->
                    <div class="row">
                        <aside class="profile-nav col-lg-4">
                            <section class="panel">
                                <div class="user-heading round">
                                    <b class="label label-success label-mini" style="position: relative; top: 50px; left: 60px;"><?php
                                                                                                                                    $estado = $usuario['Estado'];
                                                                                                                                    if ($estado == 1) {
                                                                                                                                        echo "Activo";
                                                                                                                                    } else {
                                                                                                                                        echo "Inactivo";
                                                                                                                                    } 
                                                                                                                                    ?></b>
                                    <br>
                                    <a data-toggle="modal" href="#myModal1">
                                        <img style="background: red;"  src="<?php echo $usuario['Foto']; ?>" >
                                    </a>
                                    <br>
                                    <b style="font-size: 18px;"><?php  echo $usuario['Nombre']; ?></b>
                                    <p style="font-size: 15px;"><?php echo $usuario['Email']; ?></p>
                                </div>
                                <ul class="nav nav-pills nav-stacked">
                                    <li value="seleccionar"><a  data-toggle="modal" href="#myModal1"> <i class="fa fa-edit"></i> Editar Foto</a></li>
                                    <li value="seleccionar"><a  data-toggle="modal" href="#myModal"> <i class="fa fa-edit"></i> Editar Perfil</a></li>
                                </ul>
                            </section>
                        </aside>
                        <aside class="profile-info col-md-8">
                            <section class="panel">
                                <header class="panel-heading" style="background-color: #054261; color: #fff;">
                                    <i class="fa fa-user" style="display: inline-block; margin-top: 5px;"></i> 
                                    Datos del <b><?php echo $usuario['Nivel']; ?></b>
                                </header>
                                <div class="row">
                                    <div class="col-md-12">
                                        <section class="panel">
                                            <div class="panel-body bio-graph-info" style="background: #fff;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><b>DNI</b>:<br/> <?php echo $usuario['DNI']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><b>Teléfono</b> : <br/> <?php echo $usuario['Telefono']; ?></p><p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><b>Ocupación</b>: <br/><?php echo $usuario['Ocupacion']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Departamento</b>: <br/><?php echo $usuario['Departamento']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><b>Provincia</b>: <br/><?php echo $usuario['Provincia']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><b>Distrito</b>: <br/><?php echo $usuario['Distrito']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                            <br>
                            <section class="panel">
                                <header class="panel-heading" style="background-color: #054261; color: #fff;">
                                    <i class="fa fa-user" style="display: inline-block; margin-top: 5px;"></i> 
                                    Presentación del <b><?php echo $usuario['Nivel']; ?></b>
                                </header>
                                <div class="row">
                                    <div class="col-md-12">
                                        <section class="panel">
                                            <div class="panel-body bio-graph-info" style="background: #fff;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><?php echo $usuario['Presentacion']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </aside>
                    </div>
                <!-- page end-->
                </section>
            </section>
        <!--main content end-->
        
        <!-- Modal -->
        <div class="modal fade " id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="form-row">    
                <div class="modal-dialog">
                    <form  action="common/userAlumnoImg.php?id=<?php echo $usuario['ID']; ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #054261; color: #fff;">
                                <h4 class="modal-title" style=" display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> <?php echo $usuario['Nivel']; ?> | <b>Editar</b></h4>
                                <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="nivel" required value="<?php echo $usuario['Nivel'] ?>">       
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-4" style="text-align: center;">
                                        <img  width="100%" src="<?php echo $usuario['Foto']; ?>" alt="">
                                    </div>
                                    <input type="text" name="ruta" value="profile.php?id=" hidden>
                                    <div class="form-group col-md-8"><br/>
                                        <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp"  name="foto">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                <button  class="btn btn-success" type="submit" name="accion">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="form-row">    
                <div class="modal-dialog">
                    <form  action="common/userAlumnoEdit.php?id=<?php echo $usuario['ID']; ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header"style="background-color: #054261; color: #fff;">
                                <h4 class="modal-title" style="display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> <?php echo $usuario['Nivel']; ?> | <b>Editar</b></h4>
                                <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="nivel" required value="<?php echo $usuario['Nivel'] ?>">        
                                        <input type="hidden" name="estado" required value="<?php echo $usuario['Estado'] ?>">        
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <!--<div class="row">
                                        <div class="col-md-6">
                                            <label for="">Nivel: *</label>
                                                <select type="text" class="form-control" name="txtNivel"  require="">
                                                            <option value="<?php echo $usuario['Nivel'] ?>"><?php echo $usuario['Nivel'] ?></option>
                                                            <option>Alumno</option>
                                                            <option>Docente</option>
                                                            <option>Administrador</option>
                                                            <option>SuperAdmin</option>
                                                </select>
                                        </div>
                                        <div class="col-md-6">
                                                <label for="">Estado: *</label>
                                                <select type="text" class="form-control" name="txtEstado" require="">
                                                            <option value="<?php echo $usuario['Estado'] ?>" ><?php echo $usuario['Estado'] ?></option>
                                                            <option>Activo</option>
                                                            <option>Inactivo</option>
                                                </select>
                                        </div>
                                    </div>-->
                                    <div class="col-md-8">
                                        <label>Nombre: *</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $usuario['Nombre'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>DNI: *</label>
                                        <input type="text" class="form-control" name="dni" value="<?php echo $usuario['DNI'] ?>" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Email:</label>
                                        <input type="text" class="form-control" name="email"  value="<?php echo $usuario['Email'] ?>" readonly>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Teléfono: *</label>
                                        <input type="text" class="form-control" name="telefono" value="<?php echo $usuario['Telefono'] ?>" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Profesión / Ocupacion: *</label>
                                        <input type="text" class="form-control" name="ocupacion" value="<?php echo $usuario['Ocupacion'] ?>">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Departamento: *</label>
                                        <select type="text" class="form-control" name="departamento">
                                            <option value="<?php echo $usuario['Departamento'] ?>"><?php echo $usuario['Departamento'] ?></option>
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
                                        <input type="text" class="form-control" name="provincia" value="<?php echo $usuario['Provincia'] ?>" >
                                    </div>
                                    <div class="col-md-4">
                                        <label>Distrito *</label>
                                        <input type="text" class="form-control" name="distrito" value="<?php echo $usuario['Distrito'] ?>">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Presentación: *</label>
                                        <textarea class="wysihtml5 form-control" rows="5"  name="presentacion" ><?php echo $usuario['Presentacion']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                <button  class="btn btn-success" type="submit" name="accion">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php   }  ?>

      <!--footer start-->
      
      <?php  include ("common/footer.php"); ?>
      <!--footer end-->

    </section>

  


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
