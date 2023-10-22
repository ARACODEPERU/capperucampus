
<?php
    include ("conexion.php");
    session_start();
    if (
          $_SESSION['Nivel'] == 'Alumno' ||
          $_SESSION['Nivel'] == 'Asistente' ||
          $_SESSION['Nivel'] == 'Administrador' ||
          $_SESSION['Nivel'] == 'SuperAdmin' ){
  
        }else{
            header("Location: index.php");
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
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/gallery.css" />

<!--right slidebar-->
<link href="css/slidebars.css" rel="stylesheet">

<!--LightBox-->
<link rel="stylesheet" type="text/css" href="css/lightbox.min.css" >
<script src="js/lightbox-plus-jquery.min.js"></script>

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
    <?php include ("common/headerAlumnoCursos.php") ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <br/>
                  <header class="panel-heading" style="background-color: #054261; color: #fff;">
                        <div>
                            <i class="fa fa-book" style="display: inline-block; margin-top: 5px;"></i> 
                            <b> Clase </b> del Tema || 
                            <?php 
                        $id = $_REQUEST ['id'];
                              $query = "SELECT *, t.description NombreThemes FROM aca_themes t WHERE id ='$id' ";
                              $resultado = $conexion->query($query);
                              while($row = $resultado->fetch_assoc()){
                                ?> 
                                   <b><?php echo $row['NombreThemes'];?></b>
                                <?php } ?>
                        </div> 
                  </header>
            <br/>
                <div class="row">
                    <?php
                        $id = $_REQUEST ['id'];
                        $query = "SELECT *, t.description NombreThemes, m.description NombreModules FROM aca_themes t
                        INNER JOIN aca_modules m ON t.module_id = m.id
                        WHERE t.id ='$id' ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                    ?> 
                  <div class="col-md-4">
                      <!--widget start-->
                      <aside class="profile-nav alt green-border">
                          <section class="panel">
                              <div class="user-heading alt green-bg">
                                  <a href="#">
                                      <img alt="" src="../img/temas.png">
                                  </a>
                                  <h1><?php echo $row['NombreThemes'];?></h1>
                                  <p><?php echo $row['NombreModules'];?></p>
                              </div>

                              <ul class="nav nav-pills nav-stacked">
                        <?php
                        $id = $_REQUEST ['id'];
                        $query = "SELECT *, c.description NombreFiles, c.content EnlaceFiles FROM aca_contents c
                        WHERE theme_id='$id' and is_file=1 ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                        ?> 
                                <li>
                                    <a target="_blank" href="<?php echo $row['EnlaceFiles'];  ?>"> <i class="fa fa-file"></i> 
                                        <?php echo $row['NombreFiles'];  ?>
                                    </a>
                                </li>
                                  
                                <?php   }  ?>
                                </ul>

                          </section>
                      </aside>
                      <!--widget end-->
                  </div>
                  <?php   }  ?>
                  <div class="col-md-8">
                      
                    <?php
                        $id = $_REQUEST ['id'];
                        $query = "SELECT *, c.description NombreVideos, c.content EnlaceVideos FROM aca_contents c
                        WHERE theme_id='$id' and is_file=0 ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                    ?> 
                    
                        <section class="panel">
                            <div class="panel-body" style="padding: 0px;">
                                                <div class="panel-heading" style="background-color: #2084D2; color: #fff;">
                                                    <h4 class="modal-title" ><i class="fa fa-camera"></i> <?php echo $row['NombreVideos'];?></h4>
                                                </div>
                                                    <div class="row" style="padding: 5px;">
                                                        <div class="col-md-12">
                                                            <?php echo $row['EnlaceVideos'];?>
                                                        </div>
                                                    </div>
                            </div>
                        </section>
                    <?php  }  ?>
                  </div>
                </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

      
    <?php  include ("common/footer.php")  ?>
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
