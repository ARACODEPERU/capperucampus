
<?php
    include ("conexion.php");
    session_start();
    if (
            $_SESSION['Nivel'] == 'Ejecutiva' ||
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
        <?php include ("common/headerMatriculados.php") ?>
        <!--main content start-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <br/>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: #054261; color: #fff;">
                        <div>
                            <i class="fa fa-book" style="display: inline-block; margin-top: 5px;"></i> 
                            <b> Lista de Cursos</b> || 
                            <?php include ("conexion.php");
                                    $consulta = "SELECT count(*) as cuenta FROM aca_courses";
                                    $resultado = $conexion->query($consulta);
                                    while($row = $resultado->fetch_assoc()){
                                ?> 
                                    # <?php echo $row['cuenta'];?>
                                <?php } ?>
                        </div> 
                    </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th><i class="fa fa-book"></i> Foto</th>
                                  <th> Titulo del Curso</th>
                                  <th> Categoria</th>
                                  <th> Estado</th>
                                  <th><i class=" fa fa-edit"></i> Acción</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                
                            <?php                
                                $consulta = "SELECT *, c.image FotoCourses, c.description NombreCourses, cc.description CategoriaCourses, c.status Estado, c.id IDCourses 
                                FROM aca_courses c
                                join aca_category_courses cc on c.category_id = cc.id                                
                                ";
                                $resultado = $conexion->query($consulta);
                                while($courses = $resultado->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><img  width="50px;" height="50px;" src="../img/courses/<?php echo $courses['FotoCourses']; ?>"/></td>
                                    <td><?php echo $courses['NombreCourses']; ?></td>
                                    <td class="hidden-phone"><?php echo $courses['CategoriaCourses']; ?></td>
                                    <td><span class="label label-success label-mini">
                                      <?php if($courses['Estado'])echo "Activo"; ?></span>
                                    </td>
                                   <td>
                                        <a href="matriculados.php?id=<?php echo $courses['IDCourses'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i> Ver Alumnos</a>
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
      </section>
      <!--main content end-->
      <!--footer start-->
        <?php include ("common/footer.php");  ?>
      <!--footer end-->
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