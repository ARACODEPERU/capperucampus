
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Campus Virtual">
    <meta name="author" content="Aracode Smart Solution | Campus Virtual">
    <meta name="keyword" content="Aracode Smart Solution | Campus Virtual">
    <link rel="shortcut icon" type="image/x-icon" href="../img/clients/icon-cap.png">
    <?php // include ("common/titleCliente.php"); ?>
    
    <title>CAP PERÚ | Campus Virtual</title>

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

    <!-- Custom styles for this template -->

    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>


    <!--right slidebar-->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/slidebars.css" rel="stylesheet">


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
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading" style="background-color: #054261; color: #fff;">
                    <i class="fa  fa-book"></i> <b> Mis Cursos</b>
                  </header>
                  <div class="panel-body">
                        <ul class="grid cs-style-3">
                            <?php
                                $id = $_SESSION['ID'];
                                $query = "SELECT *, c.id IDCourses, c.image FotoCourses, c.description NombreCourses, cat.description CategoriaCourses FROM aca_cap_registrations m
                                    INNER JOIN aca_courses c ON m.course_id = c.id
                                    INNER JOIN aca_students student ON student.id=m.student_id
                                    INNER JOIN people pe ON pe.id = student.person_id
                                    INNER JOIN users us ON us.person_id=pe.id
                                    JOIN aca_category_courses cat ON cat.id = c.category_id
                                    WHERE us.id='$id' ";
                                $resultado = $conexion->query($query);
                                while($row = $resultado->fetch_assoc())
                                
                                  if ($row['status'] == true) 
                                {
                            ?>
                            <li>
                              <figure>
                                  <a href="alumnoModulesVer.php?id=<?php echo $row['IDCourses'];?>"><img src="../img/courses/<?php echo $row['FotoCourses']; ?>"></a>
                                  <figcaption>
                                      <h3><?php echo $row['NombreCourses']; ?></h3>
                                      <?php echo $row['CategoriaCourses']; ?>
                                      <a class="fancybox" rel="group"  href="alumnoModulesVer.php?id=<?php echo $row['IDCourses'];?>">Ingresar</a>
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
      <!--main content end-->

                          
      <?php include ("common/footer.php"); ?>
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