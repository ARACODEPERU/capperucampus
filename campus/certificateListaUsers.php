
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


	<!-- SWEET ALERT 2 -->	
	<!-- https://sweetalert2.github.io/ -->
    <script src="js/plugins/sweetalert2.all.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <section id="container">
        <?php include ("common/menu.php") ?>
        <?php include ("common/headerCertificados.php") ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-6">
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="admission.php">Académico</a></li>
                    <li class="active">Certificados</li>
                </ul>
            </div>
        </div>

              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                        <header class="panel-heading" style="background-color: #054261; color: #fff;">
                            <div>
                                <i class="fa fa-book" style="display: inline-block; margin-top: 5px;"></i> 
                                <b> Agregar Certificados </b> || Lista de Alumnos
                                <?php include ("conexion.php");
                                        $consulta = "SELECT count(*) as cuenta FROM users WHERE Nivel = 'Alumno'";
                                        $resultado = $conexion->query($consulta);
                                        while($row = $resultado->fetch_assoc()){
                                    ?> 
                                        # <?php echo $row['cuenta'];?>
                                    <?php } ?>
                            </div> 
                        </header>

                          <table id="example" class="table table-striped table-advance table-hover table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i> Foto</th>
                                <th><i class="fa fa-user"></i> Alumno</th>
                                <th><i class="fa fa-bookmark"></i> DNI</th>
                                <th><i class="fa fa-envelope"></i> Email</th>
                                <th><i class="fa fa-phone"></i> Teléfono</th>
                                <th><i class=" fa fa-edit"></i> Estado</th>
                                <th><i class=" fa fa-edit"></i> Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php 
                                $consulta = "SELECT * FROM users WHERE Nivel='Alumno' ORDER BY ID DESC";
                                $resultado = $conexion->query($consulta);
                                while($value= $resultado->fetch_assoc()){
                            ?> 
                                    <tr>
                                        <td><img style="width: 50px; height: 50px; border-radius: 50%;" src="../img/users/<?php echo $value['Foto']; ?>"/></td>
                                        
                                        <td><?php echo $value['Nombre']; echo " "; echo $value['ApellidoP']; echo " "; echo $value['ApellidoM'];  ?></td>
                                        <td><?php echo $value['DNI']; ?></td>
                                        <td><?php echo $value['Email']; ?></td>
                                        <td><?php echo $value['Telefono']; ?></td>
                                        <td><span class="label label-success label-mini"><?php echo ($value['Estado']); ?></span></td>
                                        <td>
                                            <a href="certificateUsuario.php?id=<?php echo $value['ID'];?>" class="btn btn-primary btn"><i class="fa fa-graduation-cap"></i> Certificado</a>
                                        </td>
                                    </tr>
                            <?php   } ?>
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



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!---
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>-->
    <script src="datatable/jquery.dataTable.min.js"></script>
    
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  </body>
</html>