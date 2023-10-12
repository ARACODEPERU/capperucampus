<?php 
require 'common/certificate.php';  
include ("common/headerAcademico.php");
?> 



      <!--main content start-->
 
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $id = $_REQUEST ['id'];
                    $sentencia= $pdo->prepare("SELECT * FROM users WHERE ID ='$id'");
                    $sentencia->execute();
                    $listaUsers=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    foreach($listaUsers as $users) {  
                ?>    
                    <h3>ALUMNO:<b> <?php echo $users['ApellidoP']; echo " "; echo $users['ApellidoM']; echo " "; echo $users['Nombre']; ?></b></h3>                                               
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <aside class="profile-info col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="row">
                                <div class="form-row">
                                    <form  action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fa fa-graduation-cap"></i> Subir Certificado</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                    <?php
                                                        $id = $_REQUEST ['id'];
                                                        $sentencia= $pdo->prepare("SELECT * FROM users WHERE ID ='$id'");
                                                        $sentencia->execute();
                                                        $listaUsers=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($listaUsers as $users) {  
                                                    ?>    
                                                    <input type="hidden"  name="txtidUsers" required value="<?php echo $users['ID']; ?>" >                                               
                                                    <?php } ?>
                                                    <input type="hidden"  name="txtEstado" required value="Activo" placeholder="" id="txtEstado" require="">        
                                                    <div class="col-md-12">
                                                        <label for="">Lista de Cursos: *</label>
                                                        <select type="text" class="form-control <?php echo (isset($error['idCourses']))?"is-invalid":"";?>" 
                                                                name="txtidCourses" value="<?php echo $txtidDocente; ?>" placeholder="" id="txtidCourses" require="">
                                                                <option>Seleccionar...</option>
                                                                <?php
                                                                    $sentencia= $pdo->prepare("SELECT * FROM courses");
                                                                    $sentencia->execute();
                                                                    $listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                                    foreach($listaUsuarios as $usuario) {  ?>
                                                                    <option value="<?php echo $usuario['IDCourses'] ?>"><?php echo $usuario['NombreCourses'];  ?></option>                                                    
                                                                <?php   }   ?>
                                                        </select>
                                                    </div>
                                            </div>
                                                <br/>
                                                <br/>
                                                <label for="">Foto:</label>
                                                    <?php if($txtFoto!="") {   ?>
                                                    <br/>
                                                        <img class="img-thumbnail rounded mx-auto d-block" 
                                                                width="80px"  src="../../img/certificate/<?php  echo $txtFoto; ?>" alt="">
                                                        <br/><br/>
                                                    <?php  }  ?>
                                                        <input  type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto; ?>" placeholder="" id="txtFoto" require="">
                                                    <br/>
                                        </div>
                                        <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                            </div>
                        </section>
                    </aside>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Lista de cursos adquiridos</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th><i class="fa fa-book"></i> Foto</th>
                                  <th> Titulo del Curso</th>
                                  <th> Categoria</th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                
                                $id = $_REQUEST ['id'];
                                $query = "SELECT * FROM matriculas ma
                                INNER JOIN courses c ON ma.idCourses = c.IDCourses
                                WHERE idUsers='$id' ";
                                $resultado = $conexion->query($query);
                                while($row = $resultado->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td><img  width="50px;" height="50px;" src="../img/courses/<?php echo $row['FotoCourses']; ?>"/></td>
                                    <td><?php echo $row['NombreCourses']; ?></td>
                                    <td class="hidden-phone"><?php echo $row['CategoriaCourses']; ?></td>
                                </tr>
                                <?php  }  ?>
                            </tbody>
                        </table>
                    </section>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                <?php
                $id = $_REQUEST ['id'];
                $query = "SELECT * FROM certificado ce
                INNER JOIN courses c ON ce.idCourses = c.IDCourses
                WHERE idUsers='$id' ";
                $resultado = $conexion->query($query);
                while($row = $resultado->fetch_assoc()){ ?>
                    <div class="col-md-6">
                        <a href="../img/certificate/<?php echo $row['Foto']; ?>" data-lightbox="mygallery" >
                            <img  width="100%;" src="../img/certificate/<?php echo $row['Foto']; ?>"/>
                        </a>
                    </div>
                <?php  }  ?>
                </div>
            </div>
        </div>
    </section>
    
</section>

<?php include ("common/footer.php") ?>
</section>
      <!--main content end-->
    

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
