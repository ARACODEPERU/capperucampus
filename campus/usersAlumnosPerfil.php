<?php
    include ("conexion.php");
    session_start();
    if (
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
<meta name="description" content="Habicom | Campus Virtual">
<meta name="author" content="Habicom | Campus Virtual">
<meta name="keyword" content="Habicom | Campus Virtual">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg">

<title>Habicon | Campus Virtual</title>

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
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <?php
                        $id = $_REQUEST ['id'];                             
                        $consulta = "SELECT * FROM users WHERE ID='$id'";
                        $resultado = $conexion->query($consulta);
                        while($alumno= $resultado->fetch_assoc()){
                    ?>
                    <aside class="profile-nav col-lg-3">
                        <section class="panel">
                            <div class="user-heading round">
                                <a data-toggle="modal" href="#myModal1">
                                    <img  src="<?php echo $alumno['Foto']; ?>" >
                                </a>
                                <h1><?php  echo $alumno['Nombre']; echo " "; echo $alumno['ApellidoP']; echo " "; echo $alumno['ApellidoM']; ?></h1>
                            </div>
                        </section>
                        <section class="panel">
                            <div class="panel-body bio-graph-info" style="background: #fff;">
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span><b>Nombre</b> </span>: <?php echo $alumno['Nombre']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Ape. Paterno</b> </span>: <?php echo $alumno['ApellidoP']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Ape. Materno</b> </span>: <?php echo $alumno['ApellidoM']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>DNI</b></span>: <?php echo $alumno['DNI']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Email</b> </span>: <?php echo $alumno['Email']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Teléfono</b> </span>: <?php echo $alumno['Telefono']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Departamento</b> </span>: <?php echo $alumno['Departamento']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Provincia</b> </span>: <?php echo $alumno['Provincia']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Distrito</b> </span>: <?php echo $alumno['Distrito']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Ocupación</b> </span>: <?php echo $alumno['Ocupacion']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Nivel</b> </span>: <?php echo $alumno['Nivel']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Estado</b> </span>: <b class="label label-success label-mini"><?php echo $alumno['Estado']; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span><b>Presentación</b> </span>: <?php echo $alumno['Descripcion']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </aside>
                    <?php  } ?>
                    <aside class="profile-info col-lg-9">
                        <section class="panel">
                            <div class="bio-graph-heading">
                                La Escuela de Formación Integral y Desarrollo Empresarial - <b>HABICON</b> es un centro de excelencia académica que realiza actividades de investigación, capacitación y servicios de asesoría y consultoría en temas que contribuyen con el <b>desarrollo profesional.</b>
                            </div>
                            <div class="row">
                                <?php
                                    include ("common/conexion.php");
                                    $id = $_REQUEST ['id'];
                                    $query = "SELECT * FROM certificado ce
                                            INNER JOIN courses c ON ce.idCourses = c.IDCourses
                                            WHERE idUsers='$id' ";
                                    $resultado = $conexion->query($query);
                                    while($row = $resultado->fetch_assoc()){ 
                                ?>
                                <div class="col-md-6" style="padding: 10px;">
                                    <a href="<?php echo $row['Foto']; ?>" data-lightbox="mygallery" >
                                        <img  width="100%;" src="<?php echo $row['Foto']; ?>"/>
                                    </a>
                                </div>
                                <?php  }  ?>
                            </div>
                        </section>
                    </aside>
                </div>
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
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/count.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>
</html>
