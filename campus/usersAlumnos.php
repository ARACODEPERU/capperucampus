
<?php
    include ("conexion.php");
    session_start();
    if (    
        $_SESSION['Nivel'] == 'Ejecutiva' ||
		$_SESSION['Nivel'] == 'Administrador' ||
        $_SESSION['Nivel'] == 'SuperAdmin'
			 ){

		}else{
			header("Location: ../index.php");
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
        <?php include ("common/headerAlumno.php") ?>
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
                                    <i class="fa fa-users" style="display: inline-block; margin-top: 5px;"></i> 
                                    <b> Lista de Alumnos</b> || 
                                    <?php include ("conexion.php");
                                            $consulta = "SELECT COUNT(*) cuenta FROM model_has_roles mhs join roles r on mhs.role_id = r.id where r.name='Alumno'";
                                            $resultado = $conexion->query($consulta);
                                            while($row = $resultado->fetch_assoc()){
                                        ?> 
                                            # <?php echo $row['cuenta'];?>
                                        <?php } ?>
                                </div> 
                                <div><a class="btn btn-success" data-toggle="modal" href="#myModal" style="display: inline-block; float: right; margin-top: -15px;"> <b><i class="fa fa-user" style="display: inline-block; margin-top: 5px;"></i> Agregar Alumno + </b> </a></div>
                            </header>
                                <table id="example" class="table table-striped table-advance table-hover table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-user"></i> Foto</th>
                                                <th><i class="fa fa-user"></i> Alumno</th>
                                                <th><i class="fa fa-bookmark"></i> DNI</th>
                                                <th><i class="fa fa-envelope"></i> Email</th>
                                                <th><i class="fa fa-phone"></i> Teléfono</th>
                                                <th><i class=" fa fa-edit"></i> Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                        $consulta = "SELECT *, us.avatar Foto, p.names Nombre, p.father_lastname ApellidoP, p.mother_lastname ApellidoM, p.number DNI, p.email Email, p.telephone Telefono, us.id ID, status Estado 
                                                        FROM model_has_roles mhs join roles r on mhs.role_id = r.id 
                                                        join users us on us.id=mhs.model_id
                                                        join people p on p.id = us.person_id
                                                    where r.name='Alumno' ORDER BY us.id DESC";
                                        $resultado = $conexion->query($consulta);
                                        while($alumno= $resultado->fetch_assoc()){
                                    ?> 
                                        <tr>
                                            <td>
                                                <img style="width: 50px; height: 50px; border-radius: 50%;" src="../img/users/<?php echo $alumno['Foto']; ?>"/>
                                            </td>
                                                
                                        <td style="width: 23%;">
                                            <?php echo $alumno['Nombre']." ".$alumno['ApellidoP']." ".$alumno['ApellidoM']; ?><br/>
                                            <span class="label label-success label-mini"><?php
                                                                                        if ($alumno['Estado'] == 1) {
                                                                                            echo "Activo";
                                                                                        } else {
                                                                                            echo "Inactivo";
                                                                                        }
                                                                                        ?></span>
                                        </td>
                                        <td style="width: 9%;"><?php echo $alumno['DNI']; ?></td>
                                        <td style="width: 16%;"><?php echo $alumno['Email']; ?></td>
                                        <td style="width: 9%;"><?php echo $alumno['Telefono']; ?></td>
                                        <td>
                                            <a title="Matricular" href="matriUsuario.php?id=<?php echo $alumno['ID'];?>" class="btn btn-info btn"><i class="fa fa-book"></i></a>
                                            <a title="Ver Perfil" href="profile.php?id=<?php echo $alumno['ID'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                            <a title="Editar" href="usersAlumnosEditar.php?id=<?php echo $alumno['ID'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i></a>
                                            <a title="Eliminar" href="common/alumnosEliminar.php?id=<?php echo $alumno['ID'];?>" class="btn btn-danger btn" onclick="confirmDelete(event)"><i class="fa fa-trash-o "></i></a>
                                            
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
        <?php  include ("common/footer.php"); ?>
    </section>
      
            <!-- Modal -->
            <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="form-row">    
                    <div class="modal-dialog">
                        <form  action="common/alumnosGuardar.php" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #054261; color: #fff;">
                                    <h4 class="modal-title" style=" display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> Alumno | <b>Agregar</b></h4>
                                    <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden"  name="nivel" required value="Alumno">
                                            <input type="hidden"  name="estado" required value="Activo">         
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                    <div class="col-md-3">
                                            <label>Nombres: *</label>
                                            <input type="text" class="form-control" name="nombres" require="">
                                        </div>

                                        <div class="col-md-3">
                                            <label>1er Apellido: *</label>
                                            <input type="text" class="form-control" name="ApellidoP" require="">
                                        </div>

                                        <div class="col-md-3">
                                            <label>2do Apellido: *</label>
                                            <input type="text" class="form-control" name="ApellidoM" require="">
                                        </div>

                                        <div class="col-md-3">
                                            <label>DNI: *</label>
                                            <input type="number" class="form-control" name="dni" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Email: *</label>
                                            <input type="text" class="form-control" name="email" require="">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Teléfono: *</label>
                                            <input type="telephone" class="form-control" name="telefono" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Profesión / Ocupación: *</label>
                                            <input type="text" class="form-control" name="ocupacion" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Departamento: *</label>
                                            <select type="text" class="form-control" name="departamento" require="">
                                                <option>Seleccionar...</option>
                                                <option>Amazonas</option>
                                                <option>Ancash</option>
                                                <option>Apurimac</option>
                                                <option>Arequipa</option>
                                                <option>Ayacucho</option>
                                                <option>Cajamarca</option>
                                                <option>Callao</option>
                                                <option>Cusco</option>
                                                <option>Huancavelica</option>
                                                <option>Huanuco</option>
                                                <option>Ica</option>
                                                <option>Junin</option>
                                                <option>La Libertad</option>
                                                <option>Lambayeque</option>
                                                <option>Lima</option>
                                                <option>Loreto</option>
                                                <option>Madre De Dios</option>
                                                <option>Moquegua</option>
                                                <option>Pasco</option>
                                                <option>Piura</option>
                                                <option>Puno</option>
                                                <option>San Martin</option>
                                                <option>Tacna</option>
                                                <option>Tumbes</option>
                                                <option>Ucayali</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Provincia: *</label>
                                            <input type="text" class="form-control" name="provincia" require="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Distrito: *</label>
                                            <input type="text" class="form-control" name="distrito" require="">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Foto:</label>
                                            <input  type="file" class="form-control" name="foto">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                    <button class="btn btn-success" type="submit">Agregar</button>
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
            function confirmDelete(event) {
                            event.preventDefault(); // Evita que se siga el enlace de eliminación de inmediato
                            console.log(event.target.href);

                        Swal.fire({
                        title: '¿En Realidad quieres Eliminar a este Alumno?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'SI',
                        denyButtonText: `NO`,
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            Swal.fire('Eliminado!', '', 'success');
                            setTimeout(() => {
                                window.location.href = event.target.href; // Continúa con la eliminación
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