<?php 
    $id = $_SESSION ['ID'];                                
    $consulta = "SELECT *, roles.name as Nivel, users.id as ID FROM users join people on people.id = users.person_id join model_has_roles on users.id=model_has_roles.model_id join roles on roles.id = model_has_roles.role_id WHERE users.id='$id'";
    $resultado = $conexion->query($consulta);
    while($user = $resultado->fetch_assoc()){
?>
    <aside>
        <div id="sidebar"  class="nav-collapse" style="background-color: #212121;">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="index.php">                
                        <i class="fa fa-dashboard"></i>
                        <span>Principal</span>
                    </a>
                </li>
                <?php if ($user ["Nivel"] == "SuperAdmin" || 
                        $user ["Nivel"] == "Administrador"): ?>
                <li>
                    <a href="usersDocentes.php">                
                        <i class="fa fa-user"></i>
                        <span>Docentes</span>
                    </a>
                </li>
                <?php endif ?>

                <?php if ($user ["Nivel"] == "SuperAdmin" || 
                        $user ["Nivel"] == "Administrador" ||
                        $user ["Nivel"] == "Asistente"): ?>
                <li>
                    <a class="active" href="usersAlumnos.php">                
                        <i class="fa fa-users"></i>
                        <span>Alumnos</span>
                    </a>
                </li>
                <?php endif ?>

                <?php if ($user ["Nivel"] == "SuperAdmin" || 
                            $user ["Nivel"] == "Administrador"): ?>
                <li>
                    <a href="coursesLista.php">
                        <i class="fa  fa-book"></i>
                        <span>Cursos</span>
                    </a>
                </li>
                <?php endif ?>
                
                <?php if ($user ["Nivel"] == "SuperAdmin" || 
                            $user ["Nivel"] == "Administrador" ||
                            $user ["Nivel"] == "Asistente"): ?>
                <li>
                    <a href="matriListaCourses.php">
                        <i class="fa  fa-laptop"></i>
                        <span>Matriculados</span>
                    </a>
                </li>
                <?php endif ?>
                
                <?php if ($user ["Nivel"] == "SuperAdmin" || 
                            $user ["Nivel"] == "Administrador" ||
                            $user ["Nivel"] == "Asistente"): ?>
                <li>
                    <a href="certificateListaUsers.php">
                        <i class="fa  fa-graduation-cap"></i>
                        <span>Certificados</span>
                    </a>
                </li>
                <?php endif ?>
                
                <?php if ($user ["Nivel"] == "SuperAdmin" || 
                        $user ["Nivel"] == "Administrador" || 
                        $user ["Nivel"] == "Asistente" || 
                        $user ["Nivel"] == "Alumno"): ?>
                <li>                
                    <a href="alumnoCourses.php">
                        <i class="fa fa-book"></i>
                        <span>Mis Cursos</span>
                    </a>
                </li>
                <?php endif ?>

                <?php if ($user ["Nivel"] == "SuperAdmin" || 
                        $user ["Nivel"] == "Administrador" || 
                        $user ["Nivel"] == "Asistente" || 
                        $user ["Nivel"] == "Alumno"): ?>
                <li>
                    <a href="alumnoCertificate.php">
                        <i class="fa  fa-bar-chart-o"></i>
                        <span>Mis Certificados</span>
                    </a>
                </li>
                <?php endif ?>

                <li class="nav-item">
                    <a href="common/cerrarSesion.php">
                        <i class="fa fa-sign-out"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
<?php  } ?>