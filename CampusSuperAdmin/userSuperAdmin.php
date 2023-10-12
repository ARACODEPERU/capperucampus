
<?php 
require 'common/usersAgregarSuperAdmin.php';  
include ("common/headerUsers.php");
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-6">
                <ul class="breadcrumb"  style="padding: 15px;">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="userAdministrador.php">Usuarios</a></li>
                    <li class="active">Administrador</li>
                    <li>
                    <!-- Modal -->
                    <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="form-row">    
                            <div class="modal-dialog">
                                <form  action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-user"></i> Nuevo Super Administrador</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="hidden"  name="txtID" required value="<?php echo $txtID; ?>" placeholder="" id="txtID" require="">
                                                    <input type="hidden"  name="txtNivel" required value="SuperAdmin" placeholder="" id="txtNivel" require="">
                                                    <input type="hidden"  name="txtEstado" required value="Activo" placeholder="" id="txtEstado" require="">        
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Nombre: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":"";?>" 
                                                            name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="" id="txtNombre" require="">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['Nombre']))?$error['Nombre']:"";?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Apellido Paterno: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['ApellidoP']))?"is-invalid":"";?>" 
                                                            name="txtApellidoP" value="<?php echo $txtApellidoP; ?>" placeholder="" id="txtApellidoP" require="">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['ApellidoP']))?$error['ApellidoP']:"";?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">   
                                                    <label for="">Apellido Materno: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['ApellidoM']))?"is-invalid":"";?>" 
                                                        name="txtApellidoM" value="<?php echo $txtApellidoM; ?>" placeholder="" id="txtApellidoM" require="">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['ApellidoM']))?$error['ApellidoM']:"";?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">DNI: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['DNI']))?"is-invalid":"";?>" 
                                                            name="txtDNI" value="<?php echo $txtDNI; ?>" placeholder="" id="txtDNI" require="">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['DNI']))?$error['DNI']:"";?>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="">Email: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['Email']))?"is-invalid":"";?>" 
                                                            name="txtEmail"  value="<?php echo $txtEmail; ?>" placeholder="" id="txtEmail" require="">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['Email']))?$error['Email']:"";?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Telefono Principal: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['Telefono1']))?"is-invalid":"";?>" 
                                                            name="txtTelefono1" value="<?php echo $txtTelefono1; ?>" placeholder="" id="txtTelefono1" require="">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['Telefono1']))?$error['Telefono1']:"";?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Departamento: *</label>
                                                    <select type="text" class="form-control <?php echo (isset($error['Departamento']))?"is-invalid":"";?>" 
                                                            name="txtDepartamento" require="">
                                                            <option>Seleccionar...</option>
                                                            <option>Amazonas</option>
                                                            <option>Ancash</option>
                                                            <option>Apurimac</option>
                                                            <option>Arequipa</option>
                                                            <option>Ayacucho</option>
                                                            <option>Cajamarca</option>
                                                            <option>Callao</option>
                                                            <option>Cusco</option>
                                                            <option>Huancavelica</option>
                                                            <option>Huanuco</option>
                                                            <option>Ica</option>
                                                            <option>Junin</option>
                                                            <option>La Libertad</option>
                                                            <option>Lambayeque</option>
                                                            <option>Lima</option>
                                                            <option>Loreto</option>
                                                            <option>Madre De Dios</option>
                                                            <option>Moquegua</option>
                                                            <option>Pasco</option>
                                                            <option>Piura</option>
                                                            <option>Puno</option>
                                                            <option>San Martin</option>
                                                            <option>Tacna</option>
                                                            <option>Tumbes</option>
                                                            <option>Ucayali</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">   
                                                    <label for="">Provincia: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['Provincia']))?"is-invalid":"";?>" 
                                                            name="txtProvincia" value="<?php echo $txtProvincia; ?>" placeholder="" id="txtProvincia">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['Provincia']))?$error['Provincia']:"";?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Distrito: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['Distrito']))?"is-invalid":"";?>" 
                                                            name="txtDistrito" value="<?php echo $txtDistrito; ?>" placeholder="" id="txtDistrito" require="">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['Distrito']))?$error['Distrito']:"";?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Ocupación: * </label>
                                                    <input type="text" class="form-control <?php echo (isset($error['Ocupacion']))?"is-invalid":"";?>" 
                                                            name="txtOcupacion" value="<?php echo $txtOcupacion; ?>" placeholder="" id="txtOcupacion">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['Ocupacion']))?$error['Ocupacion']:"";?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Empresa: *</label>
                                                    <input type="text" class="form-control <?php echo (isset($error['Empresa']))?"is-invalid":"";?>" 
                                                            name="txtEmpresa"  value="<?php echo $txtEmpresa; ?>" placeholder="" id="txtEmpresa">
                                                    <div class="invalid-feedback">
                                                        <?php echo (isset($error['Empresa']))?$error['Empresa']:"";?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                                <label for="">Foto:</label>
                                                    <?php if($txtFoto!="") { ?>
                                                        <br/>
                                                        <img class="img-thumbnail rounded mx-auto d-block" width="80px"  src="../../img/users/<?php  echo $txtFoto; ?>  " alt="">
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
                        <a class="btn btn-success" data-toggle="modal" href="#myModal">Agregar Super Administrador +</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Lista de Super Administradores
                    </header>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user"></i> Foto</th>
                                <th><i class="fa fa-user"></i> Nombre</th>
                                <th><i class="fa fa-user"></i> A.Paterno</th>
                                <th><i class="fa fa-user"></i> A.Materno</th>
                                <th><i class="fa fa-bookmark"></i> DNI</th>
                                <th><i class="fa fa-envelope"></i> Email</th>
                                <th><i class=" fa fa-edit"></i> Estado</th>
                                <th><i class=" fa fa-edit"></i> Acción</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sentencia= $pdo->prepare("SELECT * FROM users WHERE Nivel='SuperAdmin' ");
                            $sentencia->execute();
                            $listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listaUsuarios as $usuario) {  
                            ?>
                            <tr>
                                <td><img  width="50px;" height="50px;" src="../img/users/<?php echo $usuario['Foto']; ?>"/></td>
                                <td><?php echo $usuario['Nombre']; ?></td>
                                <td class="hidden-phone"><?php echo $usuario['ApellidoP']; ?></td>
                                <td><?php echo $usuario['ApellidoM']; ?></td>
                                <td><?php echo $usuario['DNI']; ?></td>
                                <td><?php echo $usuario['Email']; ?></td>
                                <td><span class="label label-success label-mini"><?php echo ($usuario['Activo']="Activo"); ?></span></td>
                                <td>
                                    <a href="profile.php?id=<?php echo $usuario['ID'];?>" class="btn btn-success btn"><i class="fa fa-eye"></i></a>
                                    <a href="profileEditarSuperAdmin.php?id=<?php echo $usuario['ID'];?>" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Editar </a>
                                    <a href="common/usersEliminarSuperAdmin.php?ID=<?php echo $usuario['ID'];?>" class="btn btn-danger btn"><i class="fa fa-trash-o "></i></a>
                                </td>
                            </tr>                          
                            <?php  }  ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </section>
</section>
      <!--main content end-->
      <!--footer start-->

      <?php include ("common/footer.php"); ?>

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