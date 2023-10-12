
<?php 
require 'common/academicAgregarThemes.php';  
include ("common/headerAcademico.php");
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-4">
                <!--breadcrumbs start -->
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="listCursos.php">Académico</a></li>
                    <li>
                <!-- Modal -->
                <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="form-row">    
                        <div class="modal-dialog">
                            <form  action="" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-book"></i> Crear Temas</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Posicion: *</label>
                                                <select type="text" 
                                                    class="form-control <?php echo (isset($error['PosicionThemes']))?"is-invalid":"";?>" 
                                                    name="txtPosicion" require="">
                                                    <option>Seleccionar...</option>
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
                                                <?php
                                                        $id = $_REQUEST ['id'];
                                                        $sentencia= $pdo->prepare("SELECT * FROM modules WHERE IDModules='$id' ");
                                                        $sentencia->execute();
                                                        $listaModules=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($listaModules as $modules) { ?>
                                                <input type="text"  name="txtidModules" required value="<?php echo $modules['IDModules'] ?>" placeholder="" id="txtidModules" require="">        
                                                <?php   }   ?>
                                                
                                            <div class="col-md-9">
                                                <label for="">Título del Tema: *</label>
                                                <input type="text" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":"";?>" 
                                                   name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="" id="txtNombre" require="">
                                                <div class="invalid-feedback">
                                                    <?php echo (isset($error['Nombre']))?$error['Nombre']:"";?>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
                <!-- modal -->
                        <a class="btn btn-success" data-toggle="modal" href="#myModal"><b><i class="fa fa-book"></i> Crear Tema + </b></a></li>
                </ul>
                 <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Lista de Temas</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th> Posición</th>
                                  <th> Título del Tema</th>
                                  <th><i class=" fa fa-edit"></i> Crear Videos</th>
                                  <th><i class=" fa fa-edit"></i> Crear Archivos</th>
                                  <th><i class=" fa fa-edit"></i> Acciones</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                $id = $_REQUEST ['id'];
                                $sentencia= $pdo->prepare("SELECT * FROM themes WHERE idModules='$id' ORDER BY PosicionThemes asc ");
                                $sentencia->execute();
                                $listaThemes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                foreach($listaThemes as $themes) {  ?>
                                <tr>
                                    <td><?php echo $themes['PosicionThemes']; ?></td>
                                    <td><?php echo $themes['NombreThemes']; ?></td>
                                    <td>
                                        <a href="videosLista.php?id=<?php echo $themes['IDThemes'];?>" class="btn btn-primary btn">+ Videos</a>
                                    </td>
                                    <td>
                                        <a href="filesLista.php?id=<?php echo $themes['IDThemes'];?>" class="btn btn-primary btn">+ Archivos</a>
                                    </td>
                                    <td>
                                      <a href="viewModulo.php?id=<?php echo $themes['IDThemes'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                      <a href="themesEditar.php?id=<?php echo $themes['IDThemes'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Editar </a>
                                      <a href="common/acadEliminarThemes.php?id=<?php echo $themes['IDThemes'];?>" class="btn btn-danger btn"><i class="fa fa-trash-o "></i></a>
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
      <!-- Right Slidebar start -->
      <div class="sb-slidebar sb-right sb-style-overlay">
          <h5 class="side-title">Online Customers</h5>
          <ul class="quick-chat-list">
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar2.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>John Doe</strong>
                          <small>Dream Land, AU</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-important">3</span>
                          </div>
                          <strong>Jonathan Smith</strong>
                          <small>United States</small>
                      </div>
                  </div><!-- media -->
              </li>

              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/pro-ac-1.png" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-success">5</span>
                          </div>
                          <strong>Jane Doe</strong>
                          <small>ABC, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/avatar1.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>Anjelina Joli</strong>
                          <small>Fockland, UK</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/mail-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-warning">7</span>
                          </div>
                          <strong>Mr Tasi</strong>
                          <small>Dream Land, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
          </ul>
          <h5 class="side-title"> pending Task</h5>
          <ul class="p-task tasks-bar">
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">40%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">40% Complete (success)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Database Update</div>
                          <div class="percent">60%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60% Complete (warning)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Iphone Development</div>
                          <div class="percent">87%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                              <span class="sr-only">87% Complete</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Mobile App</div>
                          <div class="percent">33%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">33% Complete (danger)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">45%</div>
                      </div>
                      <div class="progress progress-striped active">
                          <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                              <span class="sr-only">45% Complete</span>
                          </div>
                      </div>

                  </a>
              </li>
              <li class="external">
                  <a href="#">See All Tasks</a>
              </li>
          </ul>
      </div>
      <!-- Right Slidebar end -->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 &copy; HABICON.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
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