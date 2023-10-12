
<?php 
require 'common/usersAgregarAlumno.php';  
include ("common/headerAcademico.php");
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-4">
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="matriListaUsers.php">Académico</a></li>
                    <li class="active">Matriculados</li>
                </ul>
            </div>
            <div class="col-lg-2"   style="background: #fff;">
                <div class="row state-overview">
                    <div class="symbol terques">
                        <i class="fa fa-group"></i>
                    </div>
                                    <?php

                                    $id = $_REQUEST ['id'];
                                    $query = "SELECT count(*) as cuenta  FROM matriculas ma
                                    INNER JOIN users u ON ma.idUsers = u.ID
                                    WHERE idCourses='$id' ";
                                    $resultado = $conexion->query($query);
                                    while($row = $resultado->fetch_assoc()){
                                    ?>
                    <div class="value">
                        <h1>
                            <?php echo $row['cuenta'];?>
                        </h1>
                        <p>Alumnos</p>
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>
        <br/>

              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Lista de Matriculados
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-user"></i> Foto</th>
                                  <th><i class="fa fa-user"></i> Alumno</th>
                                  <th><i class="fa fa-bookmark"></i> DNI</th>
                                  <th><i class="fa fa-envelope"></i> Email</th>
                                  <th><i class="fa fa-envelope"></i> Teléfono</th>
                                  <th><i class=" fa fa-edit"></i> Estado</th>
                                  <th><i class=" fa fa-edit"></i> Acción</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                  
                                    <?php

                                    $id = $_REQUEST ['id'];
                                    $query = "SELECT * FROM matriculas ma
                                    INNER JOIN users u ON ma.idUsers = u.ID
                                    WHERE idCourses='$id' ";
                                    $resultado = $conexion->query($query);
                                    while($row = $resultado->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td>
                                        <img  width="50px;" height="50px;" src="../img/users/<?php echo $row['Foto']; ?>"/></td>
                                    <td><?php echo $row['ApellidoP']; echo " "; 
                                            echo $row['ApellidoM']; echo " ";
                                            echo $row['Nombre']; ?>
                                    </td>
                                    <td><?php echo $row['DNI']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Telefono1']; ?></td>
                                    <td><span class="label label-success label-mini"><?php echo ($row['Activo']="Activo"); ?></span></td>
                                    <td>
                                        <a href="certificateUsuario.php?id=<?php echo $row['ID'];?>" class="btn btn-primary btn"><i class="fa fa-graduation-cap"></i> Certificado</a>
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
      <?php include ("common/footer.php");  ?>
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