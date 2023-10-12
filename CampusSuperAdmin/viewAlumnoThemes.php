
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
                        $query = "SELECT * FROM themes WHERE idModules='$id' ";
                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                    ?> 
                    <div class="col-md-6">
                              <!--widget start-->
                              <div class="state-overview">
                                  <section class="panel">
                                      <div class="symbol red" style="width: 20%; padding: 0px;">
                                          <a class="btn" style=" color: #fff;" href="class.php?id=<?php echo $row['IDThemes'];?>"><i class="fa fa-book"></i> <br/>
                                          Ingresar</a>
                                      </div>
                                      <a href="class.php?id=<?php echo $row['IDThemes'];?>">
                                      <div class="value" style="width: 80%;">
                                          <h2 style="text-align: left; font-size: 20px; margin: 10px; "> <?php echo $row['NombreThemes']; ?></h2>
                                          
                                      </div>
                                      </a>
                                  </section>
                              </div>
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
