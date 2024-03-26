<!DOCTYPE html>
<html lang="es">
<head>
    <?php require("../HeaderFooter/cabezal.php");?>
</head><!--/head-->

<body id="home" class="homepage">


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
                        <a class="smooth-scroll" data-section="#home" href="#home" >
                            <img src="../images/logo.png" width="40px">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>

                <!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul id="nav" class="nav navbar-nav">
                            
                            <li><a href="#">Empleado</a></li>
                        <li class="scroll"><a href="#perfil" data-section="#perfil">Clientes</a></li>
                        <li class="scroll"><a href="#cliente" data-section="#cliente">Venta</a></li>
                        <li class="scroll"><a href="#venta" data-section="#venta">Recarga</a></li>
                        <li class="scroll"><a href="#premios" data-section="#premios">Premios</a></li>
                        <li><a href="../Inicio/Inicio.php">Cerrar Sesión</a></li> 
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
                
            </div>
        </header>



    <section id="perfil">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">BIENVENIDO SEAS A GAMESIVAR</h2>
                <p class="text-center wow fadeInDown">Es un placer darte la bienvenida al equipo de GameSivar, donde la pasión por los videojuegos y la innovación son el corazón de todo lo que hacemos. Estamos emocionados de tenerte con nosotros y estamos seguros de que tu contribución será esencial en nuestra misión de ofrecer experiencias inolvidables a gamers alrededor del mundo.</p>

                <p class="text-center wow fadeInDown">Aquí en GameSivar, creemos que cada juego es una puerta a mundos nuevos, aventuras sin límites y emociones sin precedentes. Como parte de nuestro equipo, jugarás un rol crucial en conectar a nuestros clientes con esos mundos, ayudándoles a descubrir juegos que amarán y compartiendo con ellos tu pasión y conocimiento.</p>
            </div>

            <div class="row">
                

                

    <br><br><br>

    <section id="cliente">
        <div class="container">

            <div class="row">
                

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Clientes y Compras</h3>
                    <p>A continuacion puedes acceder a la informacion y registro en tiempo real de los clientes y sus compras, verificar la cantidad de compras, quien es el cliente con mayor numero de compras y verificar la cantidad de puntos acumulados por clientes.</p>

                    <p>Para verificar todo lo antes mencionado porfavor presionar el boton de "Clientes"</p>

                    <a class="btn btn-primary" href="#">Clientes</a>

                </div>
                <div class="col-sm-6 wow fadeInLeft">
                    <img style="width: 300px; height: 200px" class="img-responsive" src="../images/clientes.jpg" alt="">
                </div>
            </div>
        </div>
        
    </section><!--/#about-->
<br><br><br>
    <section id="venta">
        <div class="container">

            <div class="row">
                

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Venta</h3>
                    <p>Mediante esta opcion es posible poder efectuar una venta de una tarjeta especifica a los usuarios y clientes registrados para acceder a los productos de GameSivar. </p>

                    <p>Para verificar todo lo antes mencionado porfavor presionar el boton de "Ventas"</p>

                    <a class="btn btn-primary" href="#">Ventas</a>

                </div>
                <div class="col-sm-6 wow fadeInLeft">
                    <img style="width: 300px; height: 200px" class="img-responsive" src="../images/inventario.jpg" alt="">
                </div>
            </div>
        </div>
        
    </section><!--/#about-->
<br><br><br>
    <section id="recarga">
        <div class="container">

            <div class="row">
                

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Recargas</h3>
                    <p>Recordemos que para que un cliente pueda hacer uso de nuestros servicios y juegos necesita tener su tarjeta con los creditos necesarios. A continuacion podemos acceder a efectuar recargas a tarjetas vencidas o con falta de creditos.</p>

                    <p>Para acceder a la informacion antes mencionada porfavor entrar al siguiente boton de "Recargar"</p>

                    <a class="btn btn-primary" href="#">Recargar</a>

                </div>
                <div class="col-sm-6 wow fadeInLeft">
                    <img style="width: 300px; height: 200px" class="img-responsive" src="../images/tarjetas.png" alt="">
                </div>
            </div>
        </div>
        
    </section><!--/#about-->
<br><br><br>

<br><br><br>
    <section id="premios">
        <div class="container">

            <div class="row">
                

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Premios</h3>
                    <p>Mediante la siguiente opcion podemos ayudar a los clientes a canjear sus puntos acumulados de todas sus tarjetas electronicas para poder adquirir distintos premios disponibles.</p>

                    <p>Para acceder a la informacion antes mencionada porfavor entrar al siguiente boton de "Canjear"</p>

                    <a class="btn btn-primary" href="#">Canjear</a>

                </div>
                <div class="col-sm-6 wow fadeInLeft">
                    <img style="width: 300px; height: 200px" class="img-responsive" src="../images/usu1.jpg" alt="">
                </div>
            </div>
        </div>
        
    </section><!--/#about-->
    <br><br><br>
                
    </section><!--/#bottom-->

    <?php require("../HeaderFooter/footer.php");?>
</body>
</html>