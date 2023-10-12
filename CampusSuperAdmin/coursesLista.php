
<?php 
require 'common/academicAgregarCourses.php';  
include ("common/headerAcademico.php");
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-5">
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
                                                <h4 class="modal-title"><i class="fa fa-book"></i> Crear Curso</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden"  name="txtEstado" required value="Activo" placeholder="" id="txtEstado" require="">        
                                                    <div class="col-md-6">
                                                        <label for="">Categoria: *</label>
                                                        <select type="text" class="form-control <?php echo (isset($error['Categoria']))?"is-invalid":"";?>" 
                                                                name="txtCategoria" value="<?php echo $txtCategoria; ?>" placeholder="" id="txtCategoria" require="">
                                                                <option>Seleccionar...</option>
                                                                <option>Informatica</option>
                                                                <option>Gestión Publica</option>
                                                        </select>
                                                    </div>
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
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Título del Curso: *</label>
                                                        <input type="text" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":"";?>" 
                                                                name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="" id="txtNombre" require="">
                                                        <div class="invalid-feedback">
                                                            <?php echo (isset($error['Nombre']))?$error['Nombre']:"";?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
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
                        <a class="btn btn-success" data-toggle="modal" href="#myModal"><b><i class="fa fa-book"></i> Crear Curso + </b></a>
                    </li>
                    <li>
                        <a class="btn btn-default"  href="viewAlumnoCourses.php"><i class="fa fa-eye"></i> Ver Cursos</a>
                    </li>
                </ul>
                 <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Lista de Cursos</header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                  <th><i class="fa fa-book"></i> Foto</th>
                                  <th> Titulo del Curso</th>
                                  <th> Categoria</th>
                                  <th> Estado</th>
                                  <th> Crear</th>
                                  <th><i class=" fa fa-edit"></i> Acción</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                  
                                <?php
                                $sentencia= $pdo->prepare("SELECT * FROM courses ");
                                $sentencia->execute();
                                $listaCourses=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                foreach($listaCourses as $courses) {  ?>
                                <tr>
                                    <td><img  width="50px;" height="50px;" src="../img/courses/<?php echo $courses['FotoCourses']; ?>"/></td>
                                    <td><?php echo $courses['NombreCourses']; ?></td>
                                    <td class="hidden-phone"><?php echo $courses['CategoriaCourses']; ?></td>
                                    <td><span class="label label-success label-mini">
                                      <?php echo $courses['Estado']; ?></span>
                                    </td>
                                    <td>
                                        <a  href="modulesLista.php?id=<?php echo $courses['IDCourses'];?>" class="btn btn-primary btn">+ Módulo</a>
                                    </td> 
                                    <td>
                                      <a href="viewCurso.php?id=<?php echo $courses['IDCourses'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                      <a href="coursesEditar.php?id=<?php echo $courses['IDCourses'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Editar </a>
                                      <a href="common/acadEliminarCourses.php?id=<?php echo $courses['IDCourses'];?>" class="btn btn-danger btn"><i class="fa fa-trash-o "></i></a>
                                   </td>
                                </tr>
                                <?php  }  ?>
                              </tbody>
                          </table>
                      </section>
                  </div>


                              <!-- Modal -->
                              <div class="modal fade " id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              
                              <div class="form-row">    
                              <div class="modal-dialog">
                                          <form  action="common/usersModificarSuperAdmin.php?id=<?php echo $usuario['ID']; ?>" method="post" enctype="multipart/form-data">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title"><i class="fa fa-book"></i> Editar Curso</h4>
                                          </div>
                                          <div class="modal-body">
            <div class="row">
                
            <div class="col-md-6">
                                                <label for="">Estado: *</label>
                                                <select type="text" 
                                                    class="form-control <?php echo (isset($error['Estado']))?"is-invalid":"";?>" 
                                                    name="txtEstado" require="">
                                <option value="<?php echo $courses['Nivel'] ?>"><?php echo $courses['Nivel'] ?></option>
                                <option>Activo</option>
                                                    <option>Inactivo</option>
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