<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="index.php" class="logo">Habi<span>con</span></a>
    <!--logo end-->
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">
            <?php 
                $id = $_SESSION ['ID'];                                
                $consulta = "SELECT * FROM users WHERE ID='$id'";
                $resultado = $conexion->query($consulta);
                while($alumno = $resultado->fetch_assoc()){
            ?>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img width="40px;" alt="" src="<?php echo $alumno['Foto']; ?>">
                    <span class="username"> <?php echo $alumno['Nombre']; echo " "; echo $alumno['ApellidoP']; echo " "; echo $alumno['ApellidoM'];?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li>
                        <a href="profile.php?id=<?php echo $alumno['ID'];?>"><i class=" fa fa-suitcase"></i>Perfil</a>
                    </li>
                    <li>
                        <a href="common/cerrarSesion.php"><i class="fa fa-key"></i> Cerrar Sessión</a>
                    </li>
                </ul>
            </li>
            <?php  } ?>
        </ul>
    </div>
</header>

<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="index.php">                
                    <i class="fa fa-dashboard"></i>
                    <span>Principal</span>
                </a>
            </li>
            <li>
                <a href="usersDocentes.php">                
                    <i class="fa fa-user"></i>
                    <span>Docentes</span>
                </a>
            </li>
            <li>
                <a href="usersAlumnos.php">                
                    <i class="fa fa-users"></i>
                    <span>Alumnos</span>
                </a>
            </li>
            <li>
                <a href="coursesLista.php">
                    <i class="fa  fa-book"></i>
                    <span>Cursos</span>
                </a>
            </li>
            <li>
                <a class="active" href="matriListaAlumnos.php">
                    <i class="fa  fa-edit"></i>
                    <span>Matricular</span>
                </a>
            </li>
            <li>
                <a href="matriListaCourses.php">
                    <i class="fa  fa-laptop"></i>
                    <span>Matriculados</span>
                </a>
            </li>
            <li>
                <a href="certificateListaUsers.php">
                    <i class="fa  fa-graduation-cap"></i>
                    <span>Certificados</span>
                </a>
            </li>
        </ul>
    </div>
</aside>