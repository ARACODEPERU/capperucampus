<?php 
require 'common/usersAgregar.php'; 
include ("common/headerUsers.php");
?> 



      <!--main content start-->
      <?php
      
      $id = $_REQUEST ['id'];
$sentencia= $pdo->prepare("SELECT * FROM users WHERE ID ='$id'");
$sentencia->execute();
$listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
foreach($listaUsuarios as $usuario) {  ?>     
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img  src="../img/users/<?php echo $usuario['Foto']; ?>" alt="">
                              </a>
                              <h1><?php  echo $usuario['Nombre']; echo " "; echo $usuario['ApellidoP']; echo " "; echo $usuario['ApellidoM']; ?></h1>
                              <p><?php echo $usuario['Email']; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="profile.php?id=<?php echo $usuario['ID'];?>"> <i class="fa fa-user"></i> Profile</a></li>
                              <!--<li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
--><li value="seleccionar"><a  data-toggle="modal" href="#myModal"> <i class="fa fa-edit"></i> Editar Perfil</a></li>
                          </ul>


                              <!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              
                              <div class="form-row">    
                              <div class="modal-dialog">
                                          <form  action="common/usersModificar.php?id=<?php echo $usuario['ID']; ?>" method="post" enctype="multipart/form-data">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title"><i class="fa fa-user"></i> Editar Usuario</h4>
                                          </div>
                                          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nivel: *</label>
                    <select type="text" class="form-control" name="txtNivel"  require="">
                                <option value="<?php echo $usuario['Nivel'] ?>"><?php echo $usuario['Nivel'] ?></option>
                                <option>Alumno</option>
                                <option>Docente</option>
                                <option>Administrador</option>
                                <option>SuperAdmin</option>
                    </select>
                </div>
              <div class="col-md-6">
                    <label for="">Estado: *</label>
                    <select type="text" class="form-control" name="txtEstado" require="">
                                <option value="<?php echo $usuario['Estado'] ?>" ><?php echo $usuario['Estado'] ?></option>
                                <option>Activo</option>
                                <option>Inactivo</option>
                    </select>
                </div>

            </div>

<br/>

<div class="row">
                <div class="col-md-6">
                    <label for="">Nombre: *</label>
                    <input type="text" class="form-control" 
                           name="txtNombre" value="<?php echo $usuario['Nombre'] ?>" require="">
                </div>
                <div class="col-md-6">
                    <label for="">Apellido Paterno: *</label>
                    <input type="text" class="form-control" 
                           name="txtApellidoP" value="<?php echo $usuario['ApellidoP'] ?>" require="">
                </div>
       
            </div>

            <br/>


            <div class="row">
                <div class="col-md-6">   
                    <label for="">Apellido Materno: *</label>
                    <input type="text" class="form-control" 
                           name="txtApellidoM" value="<?php echo $usuario['ApellidoM'] ?>" require="">
                </div>
                <div class="col-md-6">
                    <label for="">DNI: *</label>
                    <input type="text" class="form-control" 
                           name="txtDNI" value="<?php echo $usuario['DNI'] ?>" require="">
                </div>
            </div>
<br/>

<div class="row">
    
<div class="col-md-12">
    
    <label for="">Email:</label>
    <input type="text" class="form-control" 
                       name="txtEmail"  value="<?php echo $usuario['Email'] ?>" require="">
   
    <br/>
    </div>
</div>

<br/>

<div class="row">
<div class="col-md-6">
    
<label for="">Telefono Principal: *</label>
<input type="text" class="form-control" 
                    name="txtTelefono1" value="<?php echo $usuario['Telefono1'] ?>" placeholder="" id="txtTelefono1" require="">
</div>
<div class="col-md-6">
    
<label for="">Departamento: *</label>
<select type="text" class="form-control" 
                    name="txtDepartamento" require="">
                                <option value="<?php echo $usuario['Departamento'] ?>" ><?php echo $usuario['Departamento'] ?></option>
                                <option>Lima</option>
</select>

</div>
</div>

<br/>


    <div class="row">
    <div class="col-md-6">
    
    <label for="">Provincia: *</label>
    <input type="text" class="form-control" 
                    name="txtProvincia" value="<?php echo $usuario['Provincia'] ?>" require="">>
    </div>

    <div class="col-md-6">
    
    <label for="">Distrito: *</label>
    <input type="text" class="form-control" 
                    name="txtDistrito" value="<?php echo $usuario['Distrito'] ?>" require="">
    </div>
    </div>

    <br/>

    <div class="row">
    <div class="col-md-6">
    
    <label for="">Ocupación: *</label>
    <input type="text" class="form-control" name="txtOcupacion" value="<?php echo $usuario['Ocupacion'] ?>" require="" >
    </div>

    <div class="col-md-6">
    
    <label for="">Empresa:</label>
    <input type="text" class="form-control" name="txtEmpresa"  value="<?php echo $usuario['Empresa'] ?>"  >
    
    <br/>
    </div>
    </div>

    <br/>


    <br/>

    <label for="">Foto:</label>

    <?php if($txtFoto!="") {   ?>
    <br/>
    <img class="img-thumbnail rounded mx-auto d-block" width="80px"  src="../img/users/<?php  echo $txtFoto; ?>  " alt="">
    <br/><br/>

    <?php  }  ?>


    <input  type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto; ?>" placeholder="" id="txtFoto" require="">
    <br>

    </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button  class="btn btn-success" type="submit" name="accion">Agregar</button>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                              
                                  </form>
</div>
                              <!-- modal -->



                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                       <section class="panel">
                          <div class="bio-graph-heading">
                              Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Datos del Usuario</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span><b>Nombre</b> </span>: <?php echo $usuario['Nombre']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Ape. Paterno</b> </span>: <?php echo $usuario['ApellidoP']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Ape. Materno</b> </span>: <?php echo $usuario['ApellidoM']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>DNI</b></span>: <?php echo $usuario['DNI']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Email</b> </span>: <?php echo $usuario['Email']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Teléfono</b> </span>: <?php echo $usuario['Telefono1']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Departamento</b> </span>: <?php echo $usuario['Departamento']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Provincia</b> </span>: <?php echo $usuario['Provincia']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Distrito</b> </span>: <?php echo $usuario['Distrito']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Ocupación</b> </span>: <?php echo $usuario['Ocupacion']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Empresa</b> </span>: <?php echo $usuario['Empresa']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Nivel</b> </span>: <?php echo $usuario['Nivel']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><b>Estado</b> </span>: <?php echo $usuario['Estado']; ?></p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <section>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="red">Envato Website</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="63" data-fgColor="#4CC5CD" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="terques">ThemeForest CMS </h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="75" data-fgColor="#96be4b" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="green">VectorLab Portfolio</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="50" data-fgColor="#cba4db" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="purple">Adobe Muse Template</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
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
              2013 &copy; FlatLab by VectorLab.
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
