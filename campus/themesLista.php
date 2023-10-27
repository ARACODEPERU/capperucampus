
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
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-4">
                <!--breadcrumbs start -->
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="listCursos.php">Académico</a></li>
                    <li>
                <!-- Modal -->
                <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="form-row">    
                        <div class="modal-dialog">
                            <form  action="common/acadAgregarThemes.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-book"></i> Crear Temas</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Posicion: *</label>
                                                <select type="text" 
                                                    class="form-control" name="PosicionThemes" required>
                                                    <option>Seleccionar...</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                </select>
                                            </div>
                                                <?php
                                                        $id = $_REQUEST ['id'];           
                                                        $consulta = "SELECT * FROM aca_modules WHERE id='$id' ";
                                                        $resultado = $conexion->query($consulta);
                                                        while($modules = $resultado->fetch_assoc()){
                                                            ?>
                                                        <input type="text" name="idModules" value="<?php echo $modules['id'] ?>" required hidden>          
                                                <?php   }   ?>
                                                
                                            <div class="col-md-9">
                                                <label for="">Título del Tema: *</label>
                                                <input type="text"  class="form-control" name="NombreThemes" required>    
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="submit" name="accion">Agregar</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
                <!-- modal -->
                        <a class="btn btn-success" data-toggle="modal" href="#myModal"><b><i class="fa fa-book"></i> Crear Tema + </b></a></li>
                </ul>
                 <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Lista de Temas</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th> Posición</th>
                                  <th> Título del Tema</th>
                                  <th><i class=" fa fa-edit"></i> Crear Videos</th>
                                  <th><i class=" fa fa-edit"></i> Crear Archivos</th>
                                  <th><i class=" fa fa-edit"></i> Acciones</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                $id = $_REQUEST ['id'];
                                $consulta = "SELECT * FROM aca_themes WHERE module_id='$id' ORDER BY position asc ";
                                
                                    $resultado = $conexion->query($consulta);
                                    while($themes = $resultado->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td><?php echo $themes['position']; ?></td>
                                    <td><?php echo $themes['description']; ?></td>
                                    <td>
                                        <a href="videosLista.php?id=<?php echo $themes['id'];?>" class="btn btn-primary btn">+ Videos</a>
                                    </td>
                                    <td>
                                        <a href="filesLista.php?id=<?php echo $themes['id'];?>" class="btn btn-primary btn">+ Archivos</a>
                                    </td>
                                    <td>
                                      <a href="class.php?id=<?php echo $themes['id'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                      <a href="themesEditar.php?id=<?php echo $themes['id'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Editar </a>
                                      <a href="common/acadEliminarThemes.php?id=<?php echo $themes['id'];?>" class="btn btn-danger btn" onclick="return confirm('¿Estás seguro de que deseas eliminar este TEMA?, recuerda que luego no podrás recuperarlo');"><i class="fa fa-trash-o "></i></a>
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

      
      <?php  include ("common/footer.php"); ?>
  </section>

  <script>
    function validarFormulario() {
        var selectElement = document.querySelector('select[name="PosicionThemes"]');
        var selectedOption = selectElement.options[selectElement.selectedIndex].value;
        
        if (selectedOption === 'Seleccionar...') {
            alert('Por favor, seleccione una opción en el campo Posición.');
            return false; // Detiene el envío del formulario
        }
        
        return true; // Permite el envío del formulario si se ha seleccionado una opción válida
    }
</script>
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