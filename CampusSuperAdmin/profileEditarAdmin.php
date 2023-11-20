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
        foreach($listaUsuarios as $usuario) {  
    ?>     
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#"><img  src="<?php echo $usuario['Foto'];?>" alt=""></a>
                        <h1><?php  echo $usuario['Nombre']; echo " "; echo $usuario['ApellidoP']; echo " "; echo $usuario['ApellidoM']; ?></h1>
                        <p><?php echo $usuario['Email']; ?></p>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="profile.php?id=<?php echo $usuario['ID'];?>"> <i class="fa fa-user"></i> Profile</a></li>
                        <li value="seleccionar"><a  data-toggle="modal" href="#myModal"> <i class="fa fa-edit"></i> Editar Perfil</a></li>
                    </ul>
                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-row">
                                <form  action="common/usersModificarAdministrador.php?id=<?php echo $usuario['ID']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fa fa-user"></i> Editar Administrador</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Nivel: *</label>
                                                    <select type="text" class="form-control" name="txtNivel"  require="">
                                                        <option value="<?php echo $usuario['Nivel'] ?>"><?php echo $usuario['Nivel'] ?></option>
                                                        <option>Alumno</option>
                                                        <option>Docente</option>
                                                        <option>Administrador</option>
                                                        <option>SuperAdmin</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
                                                    <label for="">Nombre: *</label>
                                                    <input type="text" class="form-control" 
                                                            name="txtNombre" value="<?php echo $usuario['Nombre'] ?>" require="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Apellido Paterno: *</label>
                                                    <input type="text" class="form-control" 
                                                            name="txtApellidoP" value="<?php echo $usuario['ApellidoP'] ?>" require="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Apellido Materno: *</label>
                                                    <input type="text" class="form-control" 
                                                            name="txtApellidoM" value="<?php echo $usuario['ApellidoM'] ?>" require="">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">DNI: *</label>
                                                    <input type="text" class="form-control" 
                                                            name="txtDNI" value="<?php echo $usuario['DNI'] ?>" require="">
                                                </div>
                                                <div class="col-md-4">    
                                                    <label for="">Email:</label>
                                                    <input type="text" class="form-control" 
                                                            name="txtEmail"  value="<?php echo $usuario['Email'] ?>" require="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Telefono Principal: *</label>
                                                    <input type="text" class="form-control" 
                                                            name="txtTelefono1" value="<?php echo $usuario['Telefono1'] ?>" placeholder="" id="txtTelefono1" require="">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Departamento: *</label>
                                                    <select type="text" class="form-control" 
                                                            name="txtDepartamento" require="">
                                                        <option value="<?php echo $usuario['Departamento'] ?>" ><?php echo $usuario['Departamento'] ?></option>
                                                        <option>Lima</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Provincia: *</label>
                                                        <input type="text" class="form-control" 
                                                                name="txtProvincia" value="<?php echo $usuario['Provincia'] ?>" require="">>
                                                </div>
                                                <div class="col-md-4">
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

                                                <label for="">Foto:</label>

                                                <?php if($txtFoto!="") {   ?>
                                                <br/>
                                                <img class="img-thumbnail rounded mx-auto d-block" width="80px"  src="<?php  echo $txtFoto; ?>  " alt="">
                                                <br/><br/>

                                                <?php  }  ?>

                                                    <input  type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto; ?>" placeholder="" id="txtFoto" require="">
                                                <br>

                                        </div>
                                        <div class="modal-footer">
                                              <a href="userDocente.php" class="btn btn-default" type="button">Regresar</a>
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
