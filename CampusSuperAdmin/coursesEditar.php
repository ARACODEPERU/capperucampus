<?php 
require 'common/academicAgregarCourses.php'; 
include ("common/headerAcademico.php");
?> 



      <!--main content start-->
    <?php
        $id = $_REQUEST ['id'];
        $sentencia= $pdo->prepare("SELECT * FROM courses WHERE IDCourses ='$id'");
        $sentencia->execute();
        $listaCourses=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaCourses as $courses) {  
    ?>     
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#"><img  src="../img/courses/<?php echo $courses['FotoCourses'];?>" alt=""></a>
                        <h1><?php  echo $courses['NombreCourses'];  ?></h1>
                        
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-row">
                                <form  action="common/academicModificarCourses.php?id=<?php echo $courses['IDCourses']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fa fa-book"></i> Editar Curso</h4>
                                        </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Estado: *</label>
                                                <select type="text" 
                                                    class="form-control <?php echo (isset($error['Estado']))?"is-invalid":"";?>" 
                                                    name="txtEstado" require="">
                                                    <option><?php echo $courses['Estado'] ?></option>
                                                    <option>Activo</option>
                                                    <option>Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Categoria: *</label>
                                                <select type="text" class="form-control <?php echo (isset($error['CategoriaCourses']))?"is-invalid":"";?>" 
                                                    name="txtCategoria" value="<?php echo $txtCategoria; ?>" placeholder="" id="txtCategoria" require="">
                                                    <option><?php echo $courses['CategoriaCourses'] ?></option>
                                                    <option>Informatica</option>
                                                    <option>Gestión Publica</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Título del Curso: *</label>
                                                <input type="text" class="form-control" 
                                                            name="txtNombre" value="<?php echo $courses['NombreCourses'] ?>" require="">
                                                </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Docente: *</label>
                                                <select type="text" class="form-control <?php echo (isset($error['idDocente']))?"is-invalid":"";?>" 
                                                    name="txtidDocente" value="<?php echo $txtidDocente; ?>" placeholder="" id="txtidDocente" require="">
                                                            <option>Seleccionar...</option>
                                                    <?php
                                                        $sentencia= $pdo->prepare("SELECT * FROM users WHERE Nivel='Docente' ");
                                                        $sentencia->execute();
                                                        $listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($listaUsuarios as $usuario) {  ?>
                                                            <option value="<?php echo $usuario['ID'] ?>"><?php echo $usuario['Nombre']; echo " "; echo $usuario['ApellidoP']; echo " "; echo $usuario['ApellidoM']; ?></option>                                                    
                                                    <?php   }   ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                            <label for="">Foto:</label>
                                                <?php if($txtFoto!="") {   ?>
                                            <br/>
                                                <img class="img-thumbnail rounded mx-auto d-block" 
                                                width="80px"  src="../../img/users/<?php  echo $txtFoto; ?>" alt="">
                                                <br/><br/>
                                                 <?php  }  ?>
                                            <input  type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto; ?>" placeholder="" id="txtFoto" require="">
                                                <br/>
                                            </div>
                                        </div>
                                        <br/>
                                        
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
