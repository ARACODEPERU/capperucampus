
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
        <?php include ("common/headerMatriculados.php") ?>
        <!--main content start-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-4">
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="matriListaUsers.php">Académico</a></li>
                    <li class="active">Matriculados</li>
                </ul>
            </div>
            <div class="col-lg-2"   style="background: #fff;">
                <div class="row state-overview">
                    <div class="symbol terques">
                        <i class="fa fa-group"></i>
                    </div>
                                    <?php

                                    $id = $_REQUEST ['id'];
                                    $query = "SELECT count(*) as cuenta  FROM aca_cap_registrations m
                                    inner join aca_students st on m.student_id = st.id inner  join people p on p.id = st.person_id
                                    inner join users us on us.person_id =  p.id inner join aca_courses c on c.id = m.course_id                                    
                                    WHERE c.id='$id' ";
                                    $resultado = $conexion->query($query);
                                    while($row = $resultado->fetch_assoc()){
                                    ?>
                    <div class="value">
                        <h1>
                            <?php echo $row['cuenta'];?>
                        </h1>
                        <p>Alumnos</p>
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>
        <br/>

              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Lista de Matriculados
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-user"></i> Foto</th>
                                  <th><i class="fa fa-user"></i> Alumno</th>
                                  <th><i class="fa fa-bookmark"></i> DNI</th>
                                  <th><i class="fa fa-envelope"></i> Email</th>
                                  <th><i class=" fa fa-edit"></i> Estado</th>
                                  <th><i class=" fa fa-edit"></i> Acción</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                  
                                    <?php

                                    $id = $_REQUEST ['id'];
                                    $query = "SELECT *, us.avatar Foto, p.father_lastname ApellidoP, p.mother_lastname ApellidoM, p.names Nombre,
                                    p.number DNI, p.email Email, us.id ID                                    
                                    FROM aca_cap_registrations m
                                    inner join aca_students st on m.student_id = st.id inner  join people p on p.id = st.person_id
                                    inner join users us on us.person_id =  p.id inner join aca_courses c on c.id = m.course_id                                    
                                    WHERE c.id='$id' ";
                                    $resultado = $conexion->query($query);
                                    while($row = $resultado->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td>
                                        <img  width="50px;" height="50px;" src="<?php echo $row['Foto']; ?>"/></td>
                                    <td><?php echo $row['ApellidoP']; echo " "; 
                                            echo $row['ApellidoM']; echo " ";
                                            echo $row['Nombre']; ?>
                                    </td>
                                    <td><?php echo $row['DNI']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><span class="label label-success label-mini"><?php echo ($row['Activo']="Activo"); ?></span></td>
                                    <td>
                                        <a href="certificateUsuario.php?id=<?php echo $row['ID'];?>" class="btn btn-primary btn"><i class="fa fa-graduation-cap"></i> Certificado</a>
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
      <?php include ("common/footer.php");  ?>
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