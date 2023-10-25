
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
<meta name="description" content="Pragot | Campus Virtual">
<meta name="author" content="Pragot | Campus Virtual">
<meta name="keyword" content="Pragot | Campus Virtual">
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
        <?php include ("common/headerCursos.php") ?>

    <?php
        $id = $_REQUEST ['id'];           
        $consulta = "SELECT * FROM aca_contents WHERE id ='$id' ";
        $resultado = $conexion->query($consulta);
        while($files = $resultado->fetch_assoc()){
        
        
        ?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#"><img  src="img/product1.jpg" alt=""></a>
                        <h1><?php  echo $files['description'];  ?></h1>
                        
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-row">
                                <form  action="common/academicModificarFiles.php?id=<?php echo $files['id']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fa fa-file"></i> Editar Archivos</h4>
                                        </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Posicion: *</label>
                                                <select type="text" class="form-control" name="posicion" require="">
                                                    <option><?php echo $files['position']; ?></option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                </select>
                                            </div>
                                                    <input type="hidden"  name="idThemes" value="<?php echo $files['theme_id']; ?>" require="">        
                                               
                                            <div class="col-md-9">
                                                <label for="">Título del Archivo: *</label>
                                                <input type="text" class="form-control" 
                                                            name="nombre" value="<?php echo $files['description']; ?>" require="">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Enlace del Video: *</label>
                                                <textarea class="wysihtml5 form-control" rows="5"  name="enlace"><?php echo $files['content']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   <div class="modal-footer">
                                              <a href="coursesLista.php" class="btn btn-default"  type="button"><i class="fa  fa-arrow-circle-left"></i> Regresar</a>
                                              <button  class="btn btn-success" type="submit" name="accion">Agregar +</button>
                                        </div>   
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
        <!-- page end-->
    </section>
</section>
      <!--main content end-->
    <?php   }  ?>
    
      <?php  include ("common/footer.php"); ?>
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
