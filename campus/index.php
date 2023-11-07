<?php
    include ("conexion.php");
    session_start();
    if (    $_SESSION['Nivel'] == 'Alumno' ||
            $_SESSION['Nivel'] == 'Ejecutiva' ||
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
        <?php include ("common/headerPrincipal.php") ?>
        <section id="main-content">
            <section class="wrapper">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="bio-graph-heading" style="padding: 5px 0px; background-color: #054261;">
                           <h4>Bienvenidos al Campus Virtual de <b>PRAGOT</b> </h4>
                        </div>
                    </div>
                </div>
                <br/>
                <?php 
                    $id = $_SESSION ['ID'];                                
                    $consulta = "SELECT *, roles.name Nivel, us.id ID,
                    CASE 
                      WHEN us.status = true THEN 'Activo'
                      ELSE 'Inactivo'
                    END AS Estado
                    FROM users us join people on people.id = us.person_id join model_has_roles on us.id=model_has_roles.model_id join roles on roles.id = model_has_roles.role_id WHERE us.id='$id'";
                    $resultado = $conexion->query($consulta);
                    while($user = $resultado->fetch_assoc()){
                ?>
                <div class="row state-overview">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <aside class="profile-nav">
                                    <section class="panel">
                                        <div class="user-heading round">
                                            <b class="label label-success label-mini" style="position: relative; top: 50px; left: 60px;"><?php echo $user['Estado']; ?></b>
                                            <br>
                                            <a data-toggle="modal" href="#myModal1">
                                                <img style="background: red;"  src="../img/users/<?php echo $user['avatar']; ?>" >
                                            </a>
                                            <br>
                                            <b style="font-size: 18px;"><?php  echo $user['names']; ?></b>
                                            <p style="font-size: 15px;"><?php echo $user['email']; ?></p>
                                        </div>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li value="seleccionar"><a  data-toggle="modal" href="#" data-target="#myModal1"> <i class="fa fa-edit"></i> Editar Foto</a></li>
                                            <li value="seleccionar"><a  data-toggle="modal" href="#myModal2"> <i class="fa fa-edit"></i> Editar Perfil</a></li>
                                        </ul>
                                    </section>
                                </aside>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <section class="panel">
                                        <div class="panel-body bio-graph-info" style="background: #fff;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><b>DNI</b>:<br/> <?php echo $user['number']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><b>Teléfono</b> : <br/> <?php echo $user['telephone']; ?></p><p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><b>Ocupación</b>: <br/><?php echo $user['ocupacion']; ?></p>
                                                </div>
                                            <?php 
                                             $id = $_SESSION ['ID'];                                
                                                $consulta2 = "SELECT *, departments.name as departamento, provinces.name as provincia, districts.name as distrito FROM districts join people on people.ubigeo = districts.id join users on users.person_id=people.id join provinces on provinces.id=districts.province_id join departments on departments.id = provinces.department_id WHERE users.id='$id'";
                                                $resultado2 = $conexion->query($consulta2);
                                                while($user_ubigeo = $resultado2->fetch_assoc()){
                                            ?>
                                                <div class="col-md-4">
                                                    <b>Departamento</b>: <br/><?php echo $user_ubigeo['departamento']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><b>Provincia</b>: <br/><?php echo $user_ubigeo['provincia']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><b>Distrito</b>: <br/><?php echo $user_ubigeo['distrito']; ?></p>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info" style="background: #fff;">
                                        <b>Presentación</b> </span>: <?php echo $user['presentacion']; ?>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <?php if ($user ["Nivel"] == "SuperAdmin"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <?php
                                        $sql = "SELECT COUNT(*) total FROM model_has_roles mhs join roles r on mhs.role_id = r.id where r.name='Administrador'";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?>
                                    <div class="value">
                                        <h1>
                                        <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Total:<b> Administrador</b></p>
                                    </div>
                                    <?php }  ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM model_has_roles mhs join roles r on mhs.role_id = r.id where r.name='Asistente'";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?>
                                    <div class="value">
                                        <h1>
                                        <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Total:<b> Asistentes</b></p>
                                    </div>
                                    <?php }  ?>
                                </section>
                            </div>
                            <?php endif ?>

                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM model_has_roles mhs join roles r on mhs.role_id = r.id where r.name='Docente'";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?>
                                    <div class="value">
                                        <h1>
                                        <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Total:<b> Docentes</b></p>
                                    </div>
                                    <?php }  ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador" || 
                                        $user ["Nivel"] == "Ejecutiva"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM model_has_roles mhs join roles r on mhs.role_id = r.id where r.name='Alumno'";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?>
                                    <div class="value">
                                        <h1>
                                        <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Total:<b> Alumnos</b></p>
                                    </div>
                                    <?php }  ?>
                                </section>
                            </div>
                            <?php endif ?>

                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador" || 
                                        $user ["Nivel"] == "Ejecutiva" || 
                                        $user ["Nivel"] == "Alumno"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) as total FROM aca_courses";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?> 
                                    <div class="value">
                                        <h1>
                                            <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Total:<b> Seminarios</b></p>
                                    </div>
                                        <?php } ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador" || 
                                        $user ["Nivel"] == "Ejecutiva" || 
                                        $user ["Nivel"] == "Alumno"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM aca_courses";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?> 
                                    <div class="value">
                                        <h1>
                                            <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Total:<b> Cursos</b></p>
                                    </div>
                                        <?php } ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol yellow">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM aca_modules";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?> 
                                    <div class="value">
                                        <h1>
                                            <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Sesiones</p>
                                    </div>
                                        <?php } ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol yellow">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM aca_themes";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?> 
                                    <div class="value">
                                        <h1>
                                            <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Temas</p>
                                    </div>
                                        <?php } ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol red">
                                        <i class="fa  fa-youtube-play"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM aca_contents Where is_file=0";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?> 
                                    <div class="value">
                                        <h1>
                                        <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Videos</p>
                                    </div>
                                    <?php } ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol red">
                                        <i class="fa fa-folder-open"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM aca_contents Where is_file=1";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?> 
                                    <div class="value">
                                        <h1>
                                        <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Archivos</p>
                                    </div>
                                    <?php } ?>
                                </section>
                            </div>
                            <?php endif ?>
                                    
                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <?php 
                                        $sql = "SELECT COUNT(*) total FROM aca_certificates";
                                        $result = $conexion->query($sql);
                                        while($fila = $result->fetch_assoc()){
                                    ?> 
                                    <div class="value">
                                        <h1>
                                        <?php echo $fila['total'];?>
                                        </h1>
                                        <p>Certificados</p>
                                    </div>
                                    <?php } ?>
                                </section>
                            </div>
                            <?php endif ?>

                            <?php if ($user ["Nivel"] == "SuperAdmin" || 
                                        $user ["Nivel"] == "Administrador" || 
                                        $user ["Nivel"] == "Ejecutiva" || 
                                        $user ["Nivel"] == "Alumno"): ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <div class="symbol yellow">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <div class="value">
                                        <h4>Mis Cursos</h4>
                                        <a class="btn btn-success" href="alumnoCourses.php"> Ingresar</a>
                                    </div>
                                </section>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="row">
                            <?php
                                $id = $_SESSION ['ID'];
                                $query = "SELECT * FROM aca_certificates ce
                                        INNER JOIN aca_courses c ON ce.course_id = c.id
                                        WHERE c.id='$id' ";
                                $resultado = $conexion->query($query);
                                while($row = $resultado->fetch_assoc()){ 
                            ?>
                            <div class="col-md-4" style="padding: 10px;">
                                <a href="../img/certificate/<?php echo $row['Foto']; ?>" data-lightbox="mygallery" >
                                    <img  width="100%;" src="../img/certificate/<?php echo $row['Foto']; ?>"/>
                                </a>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
                <?php  } ?>
            </section>
        </section>
        <!--footer start-->
        <?php include ("common/footer.php"); ?>
        <!--footer end-->
</section>

    <!-- Modal -->
    <?php 
        $id = $_SESSION ['ID'];                                
        $consulta =  "SELECT *, roles.name Nivel, us.id ID, us.avatar Foto, p.number DNI, p.telephone Telefono, p.email Email, p.ocupacion Ocupacion, p.presentacion Presentacion,
        dp.name as Departamento, p.name as Provincia, d.name as Distrito
        CASE 
          WHEN us.status = true THEN 'Activo'
          ELSE 'Inactivo'
        END AS Estado
        FROM users us join people on people.id = us.person_id join model_has_roles on us.id=model_has_roles.model_id join roles on roles.id = model_has_roles.role_id 
        join districts d on people.ubigeo = d.id join provinces p on p.id = d.province_id join departments dp on dp.id = p.department_id
        WHERE us.id='$id'";
        $resultado = $conexion->query($consulta);
        while($alumno = $resultado->fetch_assoc()){
    ?>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="form-row">    
            <div class="modal-dialog">
                <form  action="common/userAlumnoImg.php?id=<?php echo $alumno['ID']; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #054261; color: #fff;">
                            <h4 class="modal-title" style=" display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> Mi Foto | <b>Editar</b></h4>
                            <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="nivel" required value="<?php echo $alumno['Nivel'] ?>">       
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-4" style="text-align: center;">
                                    <img  width="100%" src="../img/users/<?php echo $alumno['Foto']; ?>" alt="">
                                </div>
                                <div class="form-group col-md-8"><br/>
                                    <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp"  name="foto">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                            <button  class="btn btn-success" type="submit" name="accion">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="form-row">    
            <div class="modal-dialog">
                <form  action="common/userAlumnoEdit.php?id=<?php echo $alumno['ID']; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header"style="background-color: #054261; color: #fff;">
                            <h4 class="modal-title" style="display: inline-block; margin-top: 5px;"><i class="fa fa-user"></i> Mi Perfil | <b>Editar</b></h4>
                            <button data-dismiss="modal" class="btn btn-danger" aria-hidden="true" type="button" style="display: inline-block; float: right;">X</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="nivel" required value="<?php echo $alumno['Nivel'] ?>">        
                                    <input type="hidden" name="estado" required value="<?php echo $alumno['Estado'] ?>">        
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Nombre Completos: *</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $alumno['Nombre'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label>DNI: *</label>
                                    <input type="text" class="form-control" name="dni" value="<?php echo $alumno['DNI'] ?>" readonly>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" name="email"  value="<?php echo $alumno['Email'] ?>" readonly>
                                </div>
                                <div class="col-md-5">
                                    <label>Teléfono: *</label>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $alumno['Telefono'] ?>" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Profesión / Ocupacion: *</label>
                                    <input type="text" class="form-control" name="ocupacion" value="<?php echo $alumno['Ocupacion'] ?>">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Departamento: *</label>
                                    <select type="text" class="form-control" name="departamento">
                                        <option value="<?php echo $alumno['Departamento'] ?>"><?php echo $alumno['Departamento'] ?></option>
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
                                    <input type="text" class="form-control" name="provincia" value="<?php echo $alumno['Provincia'] ?>" >
                                </div>
                                <div class="col-md-4">
                                    <label>Distrito *</label>
                                    <input type="text" class="form-control" name="distrito" value="<?php echo $alumno['Distrito'] ?>">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Me Presento: *</label>
                                    <textarea class="wysihtml5 form-control" rows="5"  name="presentacion" >
                                        <?php echo $alumno['Presentacion']; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                            <button  class="btn btn-success" type="submit" name="accion">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php  }?>
    <!-- Modal -->

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>
<script src="js/respond.min.js" ></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/count.js"></script>

<script>

//owl carousel

$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true,
        autoPlay:true

    });
});

//custom select box

$(function(){
    $('select.styled').customSelect();
});

$(window).on("resize",function(){
    var owl = $("#owl-demo").data("owlCarousel");
    owl.reinit();
});

</script>

</body>
</html>