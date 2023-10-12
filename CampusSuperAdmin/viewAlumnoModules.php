
<?php 
require 'common/academicAgregarCourses.php';  
include ("common/headerAcademico.php");
?>

<?php
      include("conexion.php");

      session_start();
      if(isset($_SESSION['u_usuario'])){
      }else{
          header ("Location: ../index.php");
      }

?>


      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
                <div class="row"> 
                    <?php
                        $id = $_REQUEST ['id'];
                        $query = "SELECT * FROM modules WHERE idCourses='$id' ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                    ?> 
                    <div class="col-md-4">
                              <!--widget start-->
                              <section class="panel">
                                  <div class="twt-feed blue-bg">
                                      <h1><b><?php echo $row['NombreModules']; ?></b></h1>
                                      <!--<p>jsmith@flatlab.com</p>-->
                                      <a href="#">
                                          <img src="../img/modulos.png" alt="">
                                      </a>
                                  </div>
                                  <div class="weather-category twt-category">
                                      
                                  </div>
                                  <footer class="twt-footer">
                                        <a href="viewAlumnoCourses.php" class="btn btn-space btn-white">
                                          <!--<i class="fa fa-camera">
                                          </i>-->
                                          Regresar
                                        </a>
                                        <a href="viewAlumnoThemes.php?id=<?php echo $row['IDModules'];?>" class="btn btn-space btn-info pull-right" type="button">
                                          <i class="fa fa-eye"></i>
                                          Ingresar
                                        </a>
                                  </footer>
                              </section>
                              <!--widget end-->
                    </div>
                         
                    <?php  }  ?>
                </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

      
      <?php include ("common/footer.php"); ?>
  </section>

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
