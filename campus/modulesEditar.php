<?php 
require 'common/academicAgregarModules.php'; 
?> 

<?php
    include ("conexion.php");
    session_start();
    if (
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
<meta name="description" content="Quantum | Campus Virtual">
<meta name="author" content="Quantum | Campus Virtual">
<meta name="keyword" content="Quantum | Campus Virtual">
    <link rel="shortcut icon" type="image/x-icon" href="../img/icoquantum">

<title>Quantum | Campus Virtual</title>

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
      <!--main content start-->
    <?php
        $id = $_REQUEST ['id'];
        $sentencia= $pdo->prepare("SELECT * FROM modules WHERE IDModules ='$id'");
        $sentencia->execute();
        $listaModules=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaModules as $modules) {  
    ?>     
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#"><img  src="../img/modulos.png" alt=""></a><br/>
                        <b style="font-size: 18px;"><?php  echo $modules['NombreModules']; ?></b>
                        
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-row">
                                <form  action="common/academicModificarModules.php?id=<?php echo $modules['IDModules']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fa fa-book"></i> Editar Módulo</h4>
                                        </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Posicion: *</label>
                                                <select type="text" 
                                                    class="form-control <?php echo (isset($error['Posicion']))?"is-invalid":"";?>" 
                                                    name="txtPosicion" require="">
                                                    <option><?php echo $modules['PosicionModules']; ?></option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                    <option>06</option>
                                                    <option>07</option>
                                                    <option>08</option>
                                                    <option>09</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                    <option>21</option>
                                                    <option>22</option>
                                                    <option>23</option>
                                                    <option>24</option>
                                                </select>
                                            </div>
                                                    <input type="hidden"  name="txtidCourses" required value="<?php echo $modules['idCourses'] ?>" placeholder="" id="txtidCourses" require="">        
                                               
                                            <div class="col-md-9">
                                                <label for="">Título del Modulos: *</label>
                                                <input type="text" class="form-control" 
                                                            name="txtNombre" value="<?php echo $modules['NombreModules'] ?>" require="">
                                            </div>
                                        </div>
                                        <br/>
                                        
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
    
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->

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
