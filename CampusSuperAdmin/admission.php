
<?php 
require 'common/usersAgregarAlumno.php';  
include ("common/headerAcademico.php");
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-6">
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="matriListaUsers.php">Académico</a></li>
                    <li class="active">Matriculas</li>
                </ul>
            </div>
        </div>

              <!-- page start-->
              <div class="row state-overview">
                  <div class="col-lg-4 col-sm-6">
                      <a href="matriListaUsers.php">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-users"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  Matricular
                              </h1>
                              <p>Ingresar</p>
                          </div>
                      </section>
                      </a>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <a href="matriListaCourses.php">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-check-square"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  Matriculados
                              </h1>
                              <p>Ingresar</p>
                          </div>
                      </section>
                      </a>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <a href="certificateListaUsers.php">
                      <section class="panel">
                          <div class="symbol gray">
                              <i class="fa fa-graduation-cap"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  Certificados
                              </h1>
                              <p>Ingresar</p>
                          </div>
                      </section>
                      </a>
                  </div>
              </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

      <?php  include ("common/footer.php"); ?>

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