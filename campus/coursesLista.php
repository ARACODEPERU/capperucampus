
<?php
    include ("conexion.php");
    session_start();
    if (
			$_SESSION['Nivel'] == 'Administrador' ||
			$_SESSION['Nivel'] == 'SuperAdmin' ){

		}else{
			header("Location: ../index.php");
		}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Campus Virtual">
        <meta name="author" content="Aracode Smart Solution | Campus Virtual">
        <meta name="keyword" content="Aracode Smart Solution | Campus Virtual">
        <link rel="shortcut icon" type="image/x-icon" href="../img/clients/icon-cap.png">

        <title>CAP PERÚ | Campus Virtual</title>

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
        <?php include ("common/headerCursos.php") ?>
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
                        <div  style="display: inline-block; float: right; margin-top: -15px;">
                            <a class="btn btn-info" href="viewAlumnoCourses.php"><i class="fa fa-eye"></i> Ver Cursos</a>
                            <a class="btn btn-success" data-toggle="modal" href="#myModal"> <b><i class="fa fa-book"></i> Crear Curso + </b> </a>
                        </div>
                    </header>
                    <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th>Foto</th>
                                  <th> Titulo del Curso</th>
                                  <th> Crear</th>
                                  <th><i class=" fa fa-edit"></i> Acción</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                            <?php                
                                $consulta = "SELECT *, c.image FotoCourses, c.description NombreCourses, c.status Estado, c.id IDCourses
                                         FROM aca_courses c ORDER BY id DESC";
                                $resultado = $conexion->query($consulta);
                                while($courses = $resultado->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><img  width="70px;" height="50px;" src="<?php echo $courses['FotoCourses']; ?>"/></td>
                                    <td>
                                        <?php echo $courses['NombreCourses']; ?> <br/>
                                        <span class="label label-success label-mini"><?php  if ($courses['Estado'])echo "Activo"; ?></span>
                                    </td>
                                    
                                    <td>
                                        <a  href="modulesLista.php?id=<?php echo $courses['IDCourses'];?>" class="btn btn-primary btn">+ Módulo</a>
                                    </td> 
                                    <td>
                                        <a title="Ver" href="viewAlumnoModules.php?id=<?php echo $courses['IDCourses']; ?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                        <a title="Editar" href="coursesEditar.php?id=<?php echo $courses['IDCourses']; ?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i></a>
                                        <a title="Eliminar" href="common/acadEliminarCourses.php?id=<?php echo $courses['IDCourses']; ?>" class="btn btn-danger btn" onclick="confirmDelete(event, 'common/acadEliminarCourses.php?id=<?php echo $courses['IDCourses']; ?>')"><i class="fa fa-trash-o"></i></a>
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
                                    <form  action="common/acadAgregarCourses.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-book"></i> Crear Curso</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden"  name="Estado" value="Activo" required >        
                                                    <div class="col-md-6">
                                                        <label for="">Sector: *</label>
                                                        <select type="text" class="form-control" 
                                                                name="CategoriaCourses">
                                                                <?php  
                                                                        $consulta = "SELECT * from aca_category_courses";
                                                                        $resultado = $conexion->query($consulta);
                                                                        while($category= $resultado->fetch_assoc()){
                                                                ?>
                                                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['description']; ?></option>                                                    
                                                                <?php   }   ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Docente: *</label>
                                                        <select type="text" class="form-control" 
                                                                name="idDocente" required>
                                                                
                                                                <?php  
                                                                        $consulta = "SELECT p.names Nombre, us.id ID 
                                                                        FROM aca_teachers tea
                                                                        join people p on p.id = tea.person_id
                                                                        join users us on us.person_id = p.id
                                                                        ORDER BY us.id DESC";
                                                                        $resultado = $conexion->query($consulta);
                                                                        while($usuario= $resultado->fetch_assoc()){
                                                                ?>
                                                                    <option value="<?php echo $usuario['ID'] ?>"><?php echo $usuario['Nombre']; ?></option>                                                    
                                                                <?php   }   ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Título del Curso: *</label>
                                                        <input type="text" class="form-control" 
                                                                name="NombreCourses" required>
                                                    </div>
                                                </div>
                                                <br/>
                                                <input  type="file" class="form-control" name="foto">
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
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
            function confirmDelete(event, ruta) {
                            event.preventDefault(); // Evita que se siga el enlace de eliminación de inmediato
                            console.log(event.target.href);

                        Swal.fire({
                        title: '¿En Realidad quieres borrar esto?',
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


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  </body>
</html>