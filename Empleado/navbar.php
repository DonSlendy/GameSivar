<?php require_once('../Login/seguridad.php');?>
<header id="top-header" class="navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a class="smooth-scroll" data-section="#home" href="#home">
                    <img src="../images/logo.png" width="40px">
                </a>
            </div>
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul id="nav" class="nav navbar-nav">
                    <li><a href="Empleado.php"><?php echo $_SESSION["nombreComSe"] ?></a></li>
                    <li class="scroll"><a href="GestionDeVentas.php" data-section="#perfil">Información de ventas</a></li>
                    <li class="scroll"><a href="#venta" data-section="#venta">Recarga</a></li>
                    <li class="scroll"><a href="#premios" data-section="#premios">Premios</a></li>
                    <li><a href="../Inicio/Inicio.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>
        <!-- /main nav -->

    </div>
</header>