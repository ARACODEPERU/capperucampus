
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
        <br/>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                                <header class="panel-heading" style="background-color: #054261; color: #fff;">
                                    <div>
                                        <i class="fa fa-book" style="display: inline-block; margin-top: 5px;"></i> 
                                        <b> Lista de Módulos</b> || 
                                        <?php include ("conexion.php");
                                                $id = $_REQUEST ['id'];
                                                $consulta = "SELECT count(*) as cuenta FROM aca_modules WHERE course_id='$id' ";
                                                $resultado = $conexion->query($consulta);
                                                while($row = $resultado->fetch_assoc()){
                                            ?> 
                                                # <?php echo $row['cuenta'];?>
                                            <?php } ?>
                                    </div> 
                                    <div><a class="btn btn-success" data-toggle="modal" href="#myModal" style="display: inline-block; float: right; margin-top: -15px;"><b><i class="fa fa-book"></i> Crear Módulos + </b></a></div>
                                </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th> Pos.</th>
                                  <th> Título del Módulo</th>
                                  <th><i class=" fa fa-edit"></i> Crear</th>
                                  <th><i class=" fa fa-edit"></i> Acciones</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                    $id = $_REQUEST ['id'];
                                    $consulta = "SELECT *, m.position PosicionModules, m.description NombreModules, m.id IDModules
                                    FROM aca_modules m WHERE course_id='$id' ORDER BY position asc ";
                                    $resultado = $conexion->query($consulta);
                                    while($modules = $resultado->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $modules['PosicionModules']; ?></td>
                                    <td style="width: 70%;"><?php echo $modules['NombreModules']; ?></td>
                                    <td>
                                        <a href="themesLista.php?id=<?php echo $modules['IDModules'];?>" class="btn btn-primary btn">+ Temas</a>
                                    </td>
                                    <td>
                                      <a href="viewAlumnoThemes.php?id=<?php echo $modules['IDModules'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                      <a href="modulesEditar.php?id=<?php echo $modules['IDModules'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i></a>
                                      <a href="common/acadEliminarModules.php?id=<?php echo $modules['IDModules'];?>" class="btn btn-danger btn" onclick="confirmDelete(event, 'common/acadEliminarModules.php?id=<?php echo $modules['IDModules'];?>')"><i class="fa fa-trash-o "></i></a>
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

  
                <!-- Modal -->
                <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="form-row">    
                        <div class="modal-dialog">
                            <form  action="common/acadAgregarModules.php" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-book"></i> Crear Módulo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Posición: *</label>
                                                <select type="text" 
                                                    class="form-control" name="PosicionModules" required>
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
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                </select>
                                            </div>
                                                <?php
                                                        $id = $_REQUEST ['id'];           
                                                        $consulta = "SELECT *, c.id IDCourses FROM aca_courses c WHERE id ='$id' ";
                                                        $resultado = $conexion->query($consulta);
                                                        while($courses = $resultado->fetch_assoc()){
                                                ?>
                                                        <input type="hidden" name="idCourses" value="<?php echo $courses['IDCourses'] ?>" required>        
                                                <?php   }   ?>
                                                
                                            <div class="col-md-9">
                                                <label for="">Título del Curso: *</label>
                                                <input type="text"  class="form-control" name="NombreModules" required>    
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                        <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button  class="btn btn-success" type="submit">Agregar</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
                <!-- modal -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
            function confirmDelete(event, ruta) {
                            event.preventDefault(); // Evita que se siga el enlace de eliminación de inmediato

                        Swal.fire({
                        title: '¿En Realidad quieres borrar este Modulo?',
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