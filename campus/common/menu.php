
<?php 
    $id = $_SESSION ['ID'];                                
    $consulta = "SELECT *, roles.name as Nivel, users.id as ID, users.avatar as avatar FROM users 
    join people on people.id = users.person_id join model_has_roles on users.id=model_has_roles.model_id 
    join roles on roles.id = model_has_roles.role_id WHERE users.id='$id'";
    $resultado = $conexion->query($consulta);
    while($user = $resultado->fetch_assoc()){
?>
    <header class="header white-bg" style="height: 80px">

        <div class="row">
           <div class="col-md-6">
                <div class="sidebar-toggle-box" style="margin-top: 35px;" >
                    <i class="fa fa-bars"></i>
                </div>
                <!--logo start-->
                <a href="index.php" class="logo"><img style="width: 150px ;" src="../img/clients/logo-cap.png" alt=""></a>
                <!--logo end-->
           </div>
           <div class="col-md-6">
                <div class="top-nav">
                    <ul class="nav pull-right top-menu">
                        <li class="dropdown" style="padding-bottom:5px;">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="padding: 5px;">
                                <img style="width: 50px; height: 50px; border-radius: 50%;" alt="img" src="<?php echo $user['avatar']; ?>">
                                &nbsp;
                                <span class="username" style="font-size: 14px;"> <?php echo $user['names']; ?></span>
                                <br/>&nbsp;
                                <b class="label label-success label-mini" style="padding: 2px; font-size: 11px;"><?php echo $user['Nivel']; ?></b>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <!--<li>
                                    <a href="profile.php?id=<?php echo $user['ID'];?>"><i class=" fa fa-suitcase"></i>Perfil</a>
                                </li>-->
                                <li>
                                    <a href="common/cerrarSesion.php"><i class="fa fa-key"></i> Cerrar Sessión</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
           </div>
        </div>




        <!--
        <div class="sidebar-toggle-box" style="margin-top: 35px;" >
            <i class="fa fa-bars"></i>
        </div>
        <a href="index.php" class="logo"><img style="width: 150px ;" src="../img/clients/logo-cap.png" alt=""></a>
        <div class="top-nav">
            <ul class="nav pull-right top-menu">
                <li class="dropdown" style="padding-bottom:5px;">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="padding: 5px;">
                        <div class="row">
                            <div class="col-md-2">
                                <img style="width: 50px; height: 50px; border-radius: 50%;" alt="img" src="<?php echo $user['avatar']; ?>">
                                
                            </div>
                            <div class="col-md-8">&nbsp;
                                <span class="username" style="font-size: 14px;"> <?php echo $user['names']; ?></span>
                                <br/>&nbsp;
                                <b class="label label-success label-mini" style="padding: 2px; font-size: 11px;"><?php echo $user['Nivel']; ?></b>
                            </div>
                            <div class="col-md-2">
                                <b class="caret"></b>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li>
                            <a href="common/cerrarSesion.php"><i class="fa fa-key"></i> Cerrar Sessión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        -->

        
    </header>
<?php  } ?>