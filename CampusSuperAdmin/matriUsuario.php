<?php 
require 'common/matriAgregarUsuario.php';  
include ("common/headerAcademico.php");
?> 



      <!--main content start-->
 
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-info col-lg-7">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-row">
                                <form  action="common/matricular.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fa fa-book"></i> Seleccionar Curso</h4>
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
                                            <input type="hidden"  name="idUsers" required value="<?php echo $users['ID']; ?>" >                                               
                                            <?php } ?>
                                            <div class="col-md-12">
                                                <label for="">Lista de Cursos</label>
                                                <select type="text" class="form-control" name="idCourses" >
                                                    <option>Seleccionar...</option>
                                                    <?php
                                                        $sentencia= $pdo->prepare("SELECT * FROM courses");
                                                        $sentencia->execute();
                                                        $listaCourses=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($listaCourses as $courses) {  ?>
                                                        <option value="<?php echo $courses['IDCourses']; ?>"><?php echo $courses['NombreCourses']; ?></option>                                                    
                                                    <?php   }   ?>
                                                </select>
                                            
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                   <div class="modal-footer">
                                        <a href="matriListaUsers.php" class="btn btn-default"  type="button"><i class="fa  fa-arrow-circle-left"></i> Regresar</a>
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

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Lista de Cursos Matriculados</header>
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
                                
                                $id = $_REQUEST ['id'];
                                $query = "SELECT * FROM matriculas ma
                                INNER JOIN courses c ON ma.idCourses = c.IDCourses
                                WHERE idUsers='$id' ";
                                $resultado = $conexion->query($query);
                                while($row = $resultado->fetch_assoc()){

                                /*$sentencia= $pdo->prepare("SELECT * FROM courses ");
                                $sentencia->execute();
                                $listaCourses=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                foreach($listaCourses as $courses) {*/  ?>
                                <tr>
                                    <td><img  width="50px;" height="50px;" src="<?php echo $row['FotoCourses']; ?>"/></td>
                                    <td><?php echo $row['NombreCourses']; ?></td>
                                    <td class="hidden-phone"><?php echo $row['CategoriaCourses']; ?></td>
                                    <td><span class="label label-success label-mini">
                                      <?php echo $row['Estado']; ?></span>
                                    </td>
                                   <td>
                                        <a href="matriListaAlumnos.php?id=<?php echo $row['IDCourses'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i> Ver Alumnos</a>
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


    </section>
</section>
      <!--main content end-->
    
    <?php include ("common/footer.php") ?>

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
