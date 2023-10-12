
<?php 
require 'common/academicAgregarThemes.php';  
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
                        $query = "SELECT * FROM themes t
                        INNER JOIN modules m ON t.idModules = m.IDModules
                        WHERE IDThemes='$id' ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                    ?> 
                  <div class="col-md-4">
                      <!--widget start-->
                      <aside class="profile-nav alt green-border">
                          <section class="panel">
                              <div class="user-heading alt green-bg">
                                  <a href="#">
                                      <img alt="" src="../img/temas.png">
                                  </a>
                                  <h1><?php echo $row['NombreThemes'];?></h1>
                                  <p><?php echo $row['NombreModules'];?></p>
                              </div>

                              <ul class="nav nav-pills nav-stacked">
                        <?php
                        $id = $_REQUEST ['id'];
                        $query = "SELECT * FROM files 
                        WHERE idThemes='$id' ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                        ?> 
                                <li>
                                    <a href="<?php echo $row['EnlaceFiles'];  ?>"> <i class="fa fa-clock-o"></i> 
                                        <?php echo $row['NombreFiles'];  ?>
                                         
                                        <span class="label  pull-right"><img style="width: 20px;" src="../img/archivos.png"></span>
                                    </a>
                                </li>
                                  
                                <?php   }  ?>
                                </ul>

                          </section>
                      </aside>
                      <!--widget end-->
                  </div>
                  <?php   }  ?>
                  <div class="col-md-8">
                      
                    <?php
                        $id = $_REQUEST ['id'];
                        $query = "SELECT * FROM videos 
                        WHERE idThemes='$id' ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                    ?> 
                    
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-row"  style="padding: 5px;">
                                <form  method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title" ><i class="fa fa-camera"></i> Video de la Clase</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12"><?php echo $row['EnlaceVideos'];?></div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                    <?php  }  ?>
                  </div>
                </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

      
    <?php  include ("common/footer.php")  ?>
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
