

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

<title>Capperu | Campus Virtual</title>

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
        <?php include ("common/headerAlumno.php") ?>
<!--main content start-->
        <?php $id = $_REQUEST ['id'];
        $consulta = "SELECT u.status Estado, u.avatar Foto, p.names Nombre, p.email Email, r.name Nivel, p.number DNI, p.telephone Telefono, p.presentacion Presentacion,
        p.ocupacion Ocupacion, dis.name Distrito, pro.name Provincia, dep.name Departamento, u.id ID, p.father_lastname ApellidoP, p.mother_lastname ApellidoM
        FROM users u join people p on p.id=u.person_id join model_has_roles mhr on mhr.model_id=u.id join roles r on r.id=mhr.role_id join districts dis on dis.id=p.ubigeo
        join provinces pro on pro.id=dis.province_id join departments dep on dep.id=pro.department_id
        WHERE u.id='$id'";
        $resultado = $conexion->query($consulta);
        while($usuario = $resultado->fetch_assoc()){ ?>     
            <section id="main-content">
                <section class="wrapper">
                    <!-- page start-->
                    <br/>
                    <div class="row">
                        <aside class="profile-nav col-lg-4">
                            <section class="panel">
                                <div class="user-heading round">
                                    <b class="label label-success label-mini" style="position: relative; top: 50px; left: 60px;"><?php
                                                                                                                                if ($usuario['Estado'] == 1) {
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
                                </ul>
                            </section>
                        </aside>
                        <aside class="profile-info col-lg-8">
                            <section class="panel">
                                <header class="panel-heading" style="background-color: #054261; color: #fff;">
                                    <i class="fa fa-user" style="display: inline-block; margin-top: 5px;"></i> 
                                    Datos del <b><?php echo $usuario['Nivel']; ?> | Editar</b>
                                </header>
                                <form  action="common/alumnosEditar.php?id=<?php echo $usuario['ID']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="nivel" required value="<?php echo $usuario['Nivel'] ?>">        
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Estado: *</label>
                                                    <select type="text" class="form-control" name="estado" required>
                                                        <option value="<?php echo $usuario['Estado'] ?>" ><?php
                                                                                                        if ($usuario['Estado'] == 1) {
                                                                                                        echo "Activo";
                                                                                                        } else {
                                                                                                        echo "Inactivo";
                                                                                                        }
                                                                                                        ?></option>
                                                        <option value="1">Activo</option>
                                                        <option value="0">Inactivo</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Nombres: *</label>
                                                    <input type="text" class="form-control" name="nombre" value="<?php echo $usuario['Nombre'] ?>" required>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>1er Apellido: *</label>
                                                    <input type="text" class="form-control" name="ApellidoP" value="<?php echo $usuario['ApellidoP'] ?>" required>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>2do Apellido: *</label>
                                                    <input type="text" class="form-control" name="ApellidoM" value="<?php echo $usuario['ApellidoM'] ?>" required>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>DNI: *</label>
                                                    <input type="text" class="form-control" name="dni" value="<?php echo $usuario['DNI'] ?>" required>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Email:</label>
                                                    <input type="text" class="form-control" name="email"  value="<?php echo $usuario['Email'] ?>" require="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Teléfono: *</label>
                                                    <input type="text" class="form-control" name="telefono" value="<?php echo $usuario['Telefono'] ?>" require="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Profesión / Ocupacion: *</label>
                                                    <input type="text" class="form-control" name="ocupacion" value="<?php echo $usuario['Ocupacion'] ?>" require="">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Departamento: *</label>
                                                    <select type="text" class="form-control" name="departamento" require="">
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
                                                    <input type="text" class="form-control" name="provincia" value="<?php echo $usuario['Provincia'] ?>" require="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Distrito *</label>
                                                    <input type="text" class="form-control" name="distrito" value="<?php echo $usuario['Distrito'] ?>" require="">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Presentación: *</label>
                                                    <!--<textarea class="wysihtml5 form-control" rows="5"  name="presentacion" readonly>-->
                                                    <textarea class="wysihtml5 form-control" rows="5"  name="presentacion"><?php echo $usuario['Presentacion']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ruta" required value="usersAlumnosEditar.php?id=">
                                        <div class="modal-footer">
                                            <a href="usersAlumnos.php" class="btn btn-danger">
                                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                            </a>
                                            <button  class="btn btn-success" type="submit" name="accion">Modificar</button>
                                        </div>
                                    </div>
                                </form>
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
                        <form  action="common/alumnosEditarImg.php?id=<?php echo $usuario['ID']; ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #054261; color: #fff;">
                                    <h4 class="modal-title" style=" display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> <?php echo $usuario['Nivel']; ?> | <b>Editar</b></h4>
                                    <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="nivel" required value="<?php echo $usuario['Nivel'] ?>">
                                            <input type="hidden" name="ruta" required value="usersAlumnosEditar.php?id=">       
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4" style="text-align: center;">
                                            <img  width="100%" src="<?php echo $usuario['Foto']; ?>" alt="">
                                        </div>
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
        <?php   }  ?>
    
      <!--main content end-->
      <?php  include ("common/footer.php"); ?>

      </section>


    <!-- Modal -->
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
