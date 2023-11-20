
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
<script src="js/lightbox-plus-jquery.min.js"></script>

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
        <?php
            $id = $_REQUEST ['id'];
            $consulta = "SELECT *, c.id IDCourses, c.description NombreCourses, c.status Estado,
            cat.description CategoriaCourses, cat.id categoria_id, u.id ID, p.names Nombre, p.father_lastname ApellidoP, p.mother_lastname ApellidoM,
            c.course_day diaCourses, c.course_month mesCourses, c.course_year yearCourses, c.image FotoCourses
            FROM users u JOIN people p ON p.id=u.person_id JOIN aca_teachers te ON te.person_id=p.id JOIN aca_courses c ON c.teacher_id=te.id
            JOIN aca_category_courses cat ON cat.id=c.category_id WHERE c.id='$id'";
            $resultado = $conexion->query($consulta);
            while($dato = $resultado->fetch_assoc()){
        ?>     
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel-body" style="background: #fff;">
                            <div class="form-row">
                                <form  action="common/academic/coursesModificar.php?id=<?php echo $dato['IDCourses']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fa fa-book"></i> Editar Curso</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Título del Curso: *</label>
                                                <input type="text" class="form-control" 
                                                        name="Nombre" value="<?php echo $dato['NombreCourses'] ?>" require="">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Estado: *</label>
                                                <select type="text" class="form-control" name="Estado" require="">
                                                    <option value ="1" <?php if($dato['Estado'])echo "selected" ?>>Activo</option>
                                                    <option value ="0" <?php if(!$dato['Estado'])echo "selected" ?>>Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sector: *</label>
                                                <select type="text" class="form-control" name="Categoria" require="">
                                                    <option value="<?php echo $dato['categoria_id'] ?>"><?php echo $dato['CategoriaCourses'] ?></option>
                                                    <?php
                                                        $consulta = "SELECT * from aca_category_courses";
                                                        $resultado = $conexion->query($consulta);
                                                        while($categorias = $resultado->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $categorias['id'] ?>">
                                                        <?php echo $categorias['description'];?>
                                                    </option>                                                    
                                                    <?php   }   ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Docente: *</label>
                                                <select type="text" class="form-control" name="idDocente" require="">
                                                    <option value="<?php echo $dato['ID'] ?>">
                                                        <?php echo $dato['Nombre']; echo " "; echo $dato['ApellidoP']; echo " "; echo $dato['ApellidoM']; ?>
                                                    </option>
                                                    <?php
                                                        $consulta = "SELECT DISTINCT u.id ID, p.names Nombre, p.father_lastname ApellidoP, p.mother_lastname ApellidoM
                                                        FROM users u JOIN people p ON p.id=u.person_id JOIN model_has_roles mhr ON u.id=mhr.model_id
                                                        JOIN roles r ON mhr.role_id=r.id
                                                        WHERE r.name='Docente'";
                                                        $resultado = $conexion->query($consulta);
                                                        while($docentes = $resultado->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $docentes['ID'] ?>">
                                                        <?php echo $docentes['Nombre']; echo " "; echo $docentes['ApellidoP']; echo " "; echo $docentes['ApellidoM']; ?>
                                                    </option>                                                    
                                                    <?php   }   ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Dias: *</label>
                                                <select type="text" class="form-control" name="Dia" require="">
                                                    <option><?php echo $dato['diaCourses'] ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
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
                                                    <option>25</option>
                                                    <option>26</option>
                                                    <option>27</option>
                                                    <option>28</option>
                                                    <option>29</option>
                                                    <option>30</option>
                                                    <option>31</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mes: *</label>
                                                <select type="text" class="form-control" name="Mes" require="">
                                                    <option><?php echo $dato['mesCourses'] ?></option>
                                                    <option>Enero</option>
                                                    <option>Febrero</option>
                                                    <option>Marzo</option>
                                                    <option>Abril</option>
                                                    <option>Mayo</option>
                                                    <option>Junio</option>
                                                    <option>Julio</option>
                                                    <option>Agosto</option>
                                                    <option>Setiembre</option>
                                                    <option>Octubre</option>
                                                    <option>Noviembre</option>
                                                    <option>Diciembre</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Año: *</label>
                                                <select type="text" class="form-control" name="Year" require="">
                                                    <option><?php echo $dato['yearCourses'] ?></option>
                                                    <option>2023</option>
                                                    <option>2024</option>
                                                    <option>2025</option>
                                                    <option>2026</option>
                                                    <option>2027</option>
                                                    <option>2028</option>
                                                    <option>2029</option>
                                                    <option>2030</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="coursesLista.php" class="btn btn-default"  type="button">
                                            <i class="fa  fa-arrow-circle-left"></i> Regresar
                                        </a>
                                        <button  class="btn btn-success" type="submit" name="accion">Modificar +</button>
                                    </div>   
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel-body" style="background: #fff;">
                            <div class="form-row">
                                <form  action="common/academic/coursesImgModificar.php?id=<?php echo $dato['IDCourses']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fa fa-book"></i> Editar Imagen</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img class="img-thumbnail" width="100%" 
                                                    src="<?php echo $dato['FotoCourses'];?>">
                                                <input  type="file" class="form-control" name="foto" require="" enctype="multipart/form-data">
                                                <br/>
                                            </div>
                                        </div>        
                                    </div>
                                    <div class="modal-footer">
                                        <a href="coursesLista.php" class="btn btn-default" type="button">
                                            <i class="fa  fa-arrow-circle-left"></i> Regresar
                                        </a>
                                        <button  class="btn btn-success" type="submit" name="accion">Modificar +</button>
                                    </div>   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <?php   }  
            include ("common/footer.php");
        ?>
    


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
