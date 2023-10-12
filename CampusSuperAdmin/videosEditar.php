<?php 
require 'common/academicAgregarVideos.php';  
include ("common/headerAcademico.php");
?> 



      <!--main content start-->
    <?php
        $id = $_REQUEST ['id'];
        $sentencia= $pdo->prepare("SELECT * FROM videos WHERE IDVideos ='$id'");
        $sentencia->execute();
        $listaVideos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaVideos as $videos) {  
    ?>     
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#"><img  src="../img/videos.jpg" alt=""></a>
                        <h1><?php  echo $videos['NombreVideos'];  ?></h1>
                        
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-row">
                                <form  action="common/academicModificarVideos.php?id=<?php echo $videos['IDVideos']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fa fa-video-camera"></i> Editar Video</h4>
                                        </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Posicion: *</label>
                                                <select type="text" 
                                                    class="form-control" 
                                                    name="txtPosicion" require="">
                                                    <option><?php echo $videos['PosicionVideos']; ?></option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                </select>
                                            </div>
                                                    <input type="hidden"  name="txtidThemes" required value="<?php echo $videos['idThemes']; ?>" placeholder="" id="txtidThemes" require="">        
                                               
                                            <div class="col-md-9">
                                                <label for="">Título del Video: *</label>
                                                <input type="text" class="form-control" 
                                                            name="txtNombre" value="<?php echo $videos['NombreVideos']; ?>" require="">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Enlace del Video: *</label>
                                                <textarea class="wysihtml5 form-control" rows="5"  name="txtEnlace"><?php echo $videos['EnlaceVideos']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   <div class="modal-footer">
                                              <a href="coursesLista.php" class="btn btn-default"  type="button"><i class="fa  fa-arrow-circle-left"></i> Regresar</a>
                                              <button  class="btn btn-success" type="submit" name="accion">Agregar +</button>
                                        </div>   
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
        <!-- page end-->
    </section>
</section>
      <!--main content end-->
    <?php   }  ?>
    
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->

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
