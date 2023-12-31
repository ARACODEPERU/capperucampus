
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
        <?php include ("common/headerAlumno.php") ?>
 
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row" style="padding:10px;">
            <?php 
                $id = $_REQUEST ['id'];                           
                $consulta = "SELECT u.avatar Foto, p.number DNI, p.email Email, p.telephone Telefono, p.ocupacion Ocupacion, p.presentacion Presentacion,
                r.name Nivel, p.names Nombre, p.mother_lastname ApellidoM, p.father_lastname ApellidoP, u.id ID
                FROM users u join people p on p.id=u.person_id join model_has_roles mhr on mhr.model_id=u.id join roles r on r.id=mhr.role_id
                WHERE u.id='$id'";
                $resultado = $conexion->query($consulta);
                while($user = $resultado->fetch_assoc()){
            ?>
                 <!--
                <div class="col-md-5">
                    <aside class="profile-nav">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="user-heading round">
                                    <a data-toggle="modal" href="#myModal1">
                                        <img  src="<?php echo $user['Foto']; ?>" >
                                    </a>
                                    <h1><?php  echo $user['Nombre'];?></h1>
                                </div>
                            </div>
                            <div class="col-md-6"  style="background: #fff; padding:10px;">
                                <p><span><b>DNI</b></span>: <?php echo $user['DNI']; ?></p>
                                <p><span><b>Email</b> </span>: <?php echo $user['Email']; ?></p>
                                <p><span><b>Teléfono</b> </span>: <?php echo $user['Telefono']; ?></p>
                                <p><span><b>Departamento</b> </span>: <?php echo $user['Departamento']; ?></p>
                                <p><span><b>Distrito</b> </span>: <?php echo $user['Distrito']; ?></p>
                                <p><span><b>Ocupación</b> </span>: <?php echo $user['Ocupacion']; ?></p>
                                <p><span><b>Nivel</b> </span>: <?php echo $user['Nivel']; ?></p>
                                <p><span><b>Estado</b> </span>: <b class="label label-success label-mini"><?php echo $user['Estado']; ?></b></p>
                            </div>
                        </div>
                    </aside>
                </div>-->
                <aside class="col-md-12">
                    <div class="row" style="padding:0px 10px;">
                        <div class="form-row"  style="background: #fff;">
                            <form  action="common/matricular.php" method="post" enctype="multipart/form-data">
                                <div class="modal-header" style="background-color: #054261; color: #fff;">
                                    <h4 class="modal-title"><i class="fa fa-book"></i>  <b>Matricular Alumno |</b> <?php  echo $user['Nombre'];?></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                     
                                        <input type="hidden"  name="idUsers" required value="<?php echo $_REQUEST ['id']; ?>" >   
                                        <input type="hidden"  name="estado" required value="Activo" >                                                               
                                        
                                        <div class="col-md-12">
                                            <p class="bg-success" style="padding: 5px;"><b>Lista de Cursos</b></p>
                                            <!--
                                            <select type="text" class="form-control" name="idCourses" >
                                                <option>Seleccionar...</option>
                                                <?php                         
                                                    $consulta = "SELECT c.description NombreCourses, c.id IDCourses FROM aca_courses c";
                                                    $resultado = $conexion->query($consulta);
                                                    while($alumno = $resultado->fetch_assoc()){
                                                ?>
                                                    <option value="<?php echo $alumno['IDCourses']; ?>"><?php echo $alumno['NombreCourses']; ?></option>                                                    
                                                <?php   }   ?>
                                            </select>
                                                    -->
                                                    
                                            <div class="row">
                                            <?php                         
                                                $consulta = "SELECT c.id IDCourses, c.description NombreCourses FROM aca_courses c";
                                                $resultado = $conexion->query($consulta);
                                                while($alumno = $resultado->fetch_assoc()){
                                            ?>
                                                <div class="col-md-6">
                                                    
                                                    <p for="check" >
                                                        <input name="idCourses"  type="radio" id="check" value="<?php echo $alumno['IDCourses']; ?>">
                                                        <?php echo $alumno['NombreCourses']; ?>
                                                    </p>
                                                </div>
                                            <?php   }   ?>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                                <div class="modal-footer">
                                    <a href="usersAlumnos.php" class="btn btn-danger"  type="button"><i class="fa  fa-arrow-circle-left"></i></a>
                                    <button  class="btn btn-success" type="submit" name="accion">Agregar +</button>
                                </div>   
                            </form>
                        </div>
                    </div>
                </aside>
            <?php  } ?>
        </div>
        <!-- page end-->

        <br/>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: #054261; color: #fff;"><i class="fa fa-book"></i>  Lista de Cursos Matriculados</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th>Foto</th>
                                  <th> Titulo del Curso</th>
                                  <th> Categoria</th>
                                  <th> Estado</th>
                                  <th><i class=" fa fa-edit"></i> Acción</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                
                                $id = $_REQUEST ['id'];
                                $query = "SELECT c.image FotoCourses, c.description NombreCourses, c.id IDCourses, cat.description CategoriaCourses,
                                m.status estado, m.id IDMatriculas
                                FROM aca_cap_registrations m
                                inner join aca_students st on m.student_id = st.id inner  join people p on p.id = st.person_id
                                inner join users u on u.person_id =  p.id inner join aca_courses c on c.id = m.course_id    
                                join aca_category_courses cat on cat.id = c.category_id                                
                                WHERE u.id='$id' ";
                                $resultado = $conexion->query($query);
                                while($row = $resultado->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><img  width="50px;" height="50px;" src="<?php echo $row['FotoCourses']; ?>"/></td>
                                    <td><?php echo $row['NombreCourses']; ?></td>
                                    <td class="hidden-phone"><?php echo $row['CategoriaCourses']; ?></td>
                                    <td>
                                        <!--<span class="label label-success label-mini">
                                      <?php echo $row['Estado']; ?></span>-->
                                      
                                        <form  action="common/estadoMatriculaEditar.php?id=<?php echo $row['IDMatriculas']; ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <input type="hidden" name="p_id" value="<?php echo $_REQUEST ['id']; ?>">
                                                            <select type="text" class="form-control" name="estado" required>
                                                                <option value="<?php echo $row['estado'] ?>" ><?php if($row['estado']){
                                                                    echo 'Activo';
                                                                }else{
                                                                    echo 'Inactivo';
                                                                }  ?></option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button  title="Activar/Desactivar" class="btn btn-success" type="submit" name="accion"><i class="fa fa-spinner" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </form>
                                    </td>
                                   <td>
                                        <a href="matriculados.php?id=<?php echo $row['IDCourses'];?>" class="btn btn-primary"><i class="fa fa-eye"></i> Alumnos</a>
                                        <a href="common/matricularEliminar.php?id=<?php echo $row['IDMatriculas']."&p_id=".$_REQUEST ['id'];?>" class="btn btn-danger btn" onclick="confirmDelete(event, 'common/matricularEliminar.php?id=<?php echo $row['IDMatriculas']."&p_id=".$_REQUEST ['id'];?>')"><i class="fa fa-trash-o "></i></a>
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
      <!--main content end-->
    

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
            function confirmDelete(event, ruta) {
                            event.preventDefault(); // Evita que se siga el enlace de eliminación de inmediato

                        Swal.fire({
                        title: '¿En Realidad quieres borrar esta Matrícula?',
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
