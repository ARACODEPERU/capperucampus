
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
<link rel="stylesheet" type="text/css" href="css/gallery.css" />

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
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <br/>
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading" style="background-color: #054261; color: #fff;">
                        <div>
                            <i class="fa fa-book" style="display: inline-block; margin-top: 5px;"></i> 
                            <b> Nuestros Cursos</b> || 
                            <?php include ("conexion.php");
                                    $consulta = "SELECT count(*) as cuenta FROM courses";
                                    $resultado = $conexion->query($consulta);
                                    while($row = $resultado->fetch_assoc()){
                                ?> 
                                    # <?php echo $row['cuenta'];?>
                                <?php } ?>
                        </div> 
                  </header>
                  <div class="panel-body">
                        <ul class="grid cs-style-3">
                          
                            <?php
                                $query = "SELECT * FROM courses";
                                $resultado = $conexion->query($query);
                                while($courses = $resultado->fetch_assoc()){
                            ?>
                            <li>
                              <figure>
                                  <a href="viewAlumnoModules.php?id=<?php echo $courses['IDCourses'];?>"><img src="../img/courses/<?php echo $courses['FotoCourses']; ?>" alt=""></a> 
                                  <figcaption>
                                      <h3><?php echo $courses['NombreCourses']; ?></h3>
                                      <span><?php echo $courses['CategoriaCourses']; ?> </span>
                                      <a class="fancybox" rel="group" href="viewAlumnoModules.php?id=<?php echo $courses['IDCourses'];?>">Ingresar</a>
                                  </figcaption>
                              </figure>
                            </li>
                                <?php } ?>
                        </ul>

                  </div>
              </section>

              <!-- page end-->
          </section>
      </section>
      
      <?php  include ("common/footer.php"); ?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/fancybox/source/jquery.fancybox.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

    <script src="js/modernizr.custom.js"></script>
    <script src="js/toucheffects.js"></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>


  </body>
</html>
