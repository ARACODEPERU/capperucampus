
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
        <?php include ("common/headerCertificados.php") ?>
        <!--main content start-->
<section id="main-content">
    <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                        <header class="panel-heading" style="background-color: #054261; color: #fff;">
                            <div>
                                <i class="fa fa-graduation-cap" style="display: inline-block; margin-top: 5px;"></i> 
                                <b> <?php 
                                                    $id = $_REQUEST ['id'];                            
                                                    $consulta = "SELECT *, p.names Nombre FROM users us join people p on p.id = us.person_id WHERE us.id='$id'";
                                        $resultado = $conexion->query($consulta);
                                        while($row = $resultado->fetch_assoc()){
                                    ?> 
                                         <?php echo $row['Nombre'];?>
                                    <?php } ?> </b> || Agregar Certificados 
                                
                            </div> 
                        </header>

                      </section>
                  </div>
              </div>
        <div class="row">
            <div class="col-md-5">
                <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"  style="background-color: #054261; color: #fff;"> <b>Subir Certificado</b> </header>
                        
                    <form  action="common/certificate.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                                <div class="row">
                                                    <?php 
                                                    $id = $_REQUEST ['id'];                            
                                                    $consulta = "SELECT *, p.names Nombre, us.id ID FROM users us join people p on p.id = us.person_id WHERE us.id='$id'";
                                                    $resultado = $conexion->query($consulta);
                                                    while($alumno = $resultado->fetch_assoc()){
                                                ?>    
                                                    <input type="hidden"  name="idUsers" required value="<?php echo $alumno['ID']; ?>" >                                               
                                                    <?php } ?>
                                                    <div class="col-md-12">
                                                        <label for="">Lista de Cursos: *</label>
                                                        <select type="text" class="form-control" 
                                                                name="idCourses" require="">
                                                                <option>Seleccionar...</option>
                                                                <?php                
                                                                        $consulta = "SELECT *, c.id IDCourses, c.description NombreCourses from users u
                                                                        join people p on u.person_id=p.id join aca_students stu on stu.person_id=p.id 
                                                                        join aca_cap_registrations reg on reg.student_id=stu.id join aca_courses c on c.id=reg.course_id
                                                                        where u.id='$id'";
                                                                        
                                                                        $resultado = $conexion->query($consulta);
                                                                        while($courses = $resultado->fetch_assoc()){
                                                                    ?>
                                                                    <option value="<?php echo $courses['IDCourses'] ?>"><?php echo $courses['NombreCourses'];  ?></option>                                                    
                                                                <?php   }   ?>
                                                        </select>
                                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Imagen del certificado:</label>
                                        <input  type="file" class="form-control" name="foto">
                                    </div>
                                </div><br/>
                                        </div>
                                        <div class="modal-footer">
                                                <button class="btn btn-success" type="submit">Agregar</button>
                                        </div> 
                                    </form>
                </section>
            </div>
            </div>
                
            
                <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Lista de certificados</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th><i class="fa fa-book"></i> Foto</th>
                                  <th> Titulo del Curso</th>
                                  <th> Categoria</th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                
                                $id = $_REQUEST ['id'];
                                $query = "SELECT  ce.id IDCertificate, ce.image Foto, c.description NombreCourses, cat.description CategoriaCourses
                                FROM users u JOIN people p ON p.id=u.person_id JOIN aca_students stu ON p.id=stu.person_id
                                JOIN aca_certificates ce ON stu.id=ce.student_id
                                JOIN aca_courses c ON ce.course_id=c.id join aca_category_courses cat ON cat.id=c.category_id 
                                WHERE u.id='$id' ";
                                $resultado = $conexion->query($query);
                                while($row = $resultado->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td><img  width="50px;" height="50px;" src="../img/certificate/<?php echo $row['Foto']; ?>"/></td>
                                    <td><?php echo $row['NombreCourses']; ?></td>
                                    <td class="hidden-phone"><?php echo $row['CategoriaCourses']; ?></td>
                                    <td>
                                        <a title="Eliminar" href="common/certificateEliminar.php?id=<?php echo $row['IDCertificate']."&user_id=".$id;?>" class="btn btn-danger btn" onclick="confirmDelete(event, 'common/certificateEliminar.php?id=<?php echo $row['IDCertificate']."&user_id=".$id;?>')"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
                                <?php  }  ?>
                            </tbody>
                        </table>
                </section>
            </div>
            </div>
            </div>

            <div class="col-md-7">
                <div class="row">
                <?php
                $id = $_REQUEST ['id'];
                $query = "SELECT ce.id IDCertificate, ce.image Foto, c.description NombreCourses, cat.description CategoriaCourses
                FROM users u JOIN people p ON p.id=u.person_id JOIN aca_students stu ON p.id=stu.person_id
                JOIN aca_certificates ce ON stu.id=ce.student_id
                JOIN aca_courses c ON ce.course_id=c.id join aca_category_courses cat ON cat.id=c.category_id 
                WHERE u.id='$id'";
                $resultado = $conexion->query($query);
                while($row = $resultado->fetch_assoc()){ ?>
                    <div class="col-md-6">
                        <a href="../img/certificate/<?php echo $row['Foto']; ?>" data-lightbox="mygallery" >
                            <img  width="100%;" src="../img/certificate/<?php echo $row['Foto']; ?>"/>
                        </a>
                    </div>
                              <!-- Modal -->
                              <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">¡Felicitaciones!</h4>
                                          </div>
                                          <div class="modal-body">
                                              <img  width="100%;" src="../img/certificate/<?php echo $row['Foto']; ?>"/>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="button">Save changes</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                <?php  }  ?>
                </div>
            </div>

        </div>

    </section>
    
</section>

<?php include ("common/footer.php") ?>
</section>
      <!--main content end-->
    

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
            function confirmDelete(event, ruta) {
                            event.preventDefault(); // Evita que se siga el enlace de eliminación de inmediato

                        Swal.fire({
                        title: '¿En Realidad quieres borrar este Certificado?',
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
