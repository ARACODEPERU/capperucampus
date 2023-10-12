
<?php 
require 'common/academicAgregarCourses.php';  
include ("common/headerAcademico.php");
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-5">
                <!--breadcrumbs start -->
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="listCursos.php">Académico</a></li>
                    <li class="active">Matriculados</li>
                </ul>
                 <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Lista de Cursos</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th><i class="fa fa-book"></i> Foto</th>
                                  <th> Titulo del Curso</th>
                                  <th> Categoria</th>
                                  <th> Estado</th>
                                  <th><i class=" fa fa-edit"></i> Acción</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                $sentencia= $pdo->prepare("SELECT * FROM courses ");
                                $sentencia->execute();
                                $listaCourses=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                foreach($listaCourses as $courses) {  ?>
                                <tr>
                                    <td><img  width="50px;" height="50px;" src="../img/courses/<?php echo $courses['FotoCourses']; ?>"/></td>
                                    <td><?php echo $courses['NombreCourses']; ?></td>
                                    <td class="hidden-phone"><?php echo $courses['CategoriaCourses']; ?></td>
                                    <td><span class="label label-success label-mini">
                                      <?php echo $courses['Estado']; ?></span>
                                    </td>
                                   <td>
                                        <a href="matriListaAlumnos.php?id=<?php echo $courses['IDCourses'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i> Ver Alumnos</a>
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
      <!--main content end-->
      <!--footer start-->
        <?php include ("common/footer.php");  ?>
      <!--footer end-->
  </section>

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