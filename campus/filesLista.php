
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
                            <form  action="common/academicAgregarFiles.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-file"></i> Crear Archivos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Posicion: *</label>
                                                <select type="text" 
                                                    class="form-control" name="posicion" require="">
                                                    <option>Seleccionar...</option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                                <?php
                                                            
                                                            $id = $_REQUEST ['id'];           
                                                            $consulta = "SELECT * FROM aca_themes WHERE id='$id' ";
                                                            $resultado = $conexion->query($consulta);
                                                            while($themes = $resultado->fetch_assoc()){
                                                                ?>
                                                <input type="text" name="idThemes" value="<?php echo $themes['id'] ?>" require="" hidden>        
                                                <?php   }   ?>
                                                
                                            <div class="col-md-9">
                                                <label for="">Título del Archivo: *</label>
                                                <input type="text" class="form-control" name="nombre" require="">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Enlace del Archivo: *</label>
                                                <textarea  type="text" class="form-control" name="enlace"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="submit">Agregar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
                <!-- modal -->
                        <a class="btn btn-success" data-toggle="modal" href="#myModal"><b><i class="fa fa-file"></i> Crear Archivo + </b></a></li>
                </ul>
                 <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Lista de Archivos</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th> Posición</th>
                                  <th> Título del Archivo</th>
                                  <!--<th> Enlace</th>-->
                                  <th><i class=" fa fa-edit"></i> Acciones</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id = $_REQUEST ['id'];           
                                    $consulta = "SELECT position PosicionFiles, description NombreFiles, content EnlaceFiles, id IDFiles FROM aca_contents WHERE theme_id='$id' and is_file = 1 ORDER BY position asc  ";
                                    $resultado = $conexion->query($consulta);
                                    while($files = $resultado->fetch_assoc()){
                                    
                                    
                                    ?>
                                <tr>
                                    <td><?php echo $files['PosicionFiles']; ?></td>
                                    <td><?php echo $files['NombreFiles']; ?></td>
                                    
                                    <td>
                                      <a target="_blank" href="<?php echo $files['EnlaceFiles']; ?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                      <a href="filesEditar.php?id=<?php echo $files['IDFiles'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Editar </a>
                                      <a href="common/acadEliminarFiles.php?id=<?php echo $files['IDFiles']."&theme_id=".$id;?>" class="btn btn-danger btn" onclick="confirmDelete(event, 'common/acadEliminarFiles.php?id=<?php echo $files['IDFiles']."&theme_id=".$id;?>')"><i class="fa fa-trash-o "></i></a>
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
        var selectElement = document.querySelector('select[name="posicion"]');
        var selectedOption = selectElement.options[selectElement.selectedIndex].value;
        
        if (selectedOption === 'Seleccionar...') {
            alert('Por favor, seleccione una opción en el campo Posición.');
            return false; // Detiene el envío del formulario
        }
        
        return true; // Permite el envío del formulario si se ha seleccionado una opción válida
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
            function confirmDelete(event, ruta) {
                            event.preventDefault(); // Evita que se siga el enlace de eliminación de inmediato

                        Swal.fire({
                        title: '¿En Realidad quieres borrar este Archivo?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'SI',
                        denyButtonText: `NO`,
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            Swal.fire('Eliminado!', '', 'success');
                            setTimeout(() => {
                                window.location.href = ruta; // Continúa con la eliminación
                            }, 800);
                            
                        } else if (result.isDenied) {
                            Swal.fire('No pasa nada.', '', 'info')
                        }
                        });
                           
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