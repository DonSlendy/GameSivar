<?php require_once('seguridadUser.php');?>

<header id="top-header" class="navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- boton responsivo de navbar -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo para la parte de navbar -->
            <div class="navbar-brand">
                <a class="smooth-scroll" data-section="#home" href="#home">
                    <!-- Icono -->
                    <img src="../images/logo.png" alt="" class="navbar-brand">
                </a>
            </div>
        </div>

        <!-- navbar -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul id="nav" class="nav navbar-nav">
                    <li><a href="Admin.php" data-section="#"><?php echo $_SESSION["nombreComSe"]?></a></li>
                    <li><a href="AdministrarEmpleados.php">Administrar Empleados</a></li>
                    <li><a href="AdministrarPremios.php">Administrar Premios</a></li>
                    <li><a href="AdministrarJuegos.php">Administrar Juegos</a></li>
                    <li><a href="ModificarAdmin.php">Modificar tus datos</a></li>
                    <li><a href="../Inicio/Inicio.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>

    </div>
</header>