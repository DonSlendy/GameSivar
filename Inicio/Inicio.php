<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../HeaderFooter/cabezal.php"); ?>
    <title>Principal</title>
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

                <div class="navbar-brand">
                    <a class="smooth-scroll" data-section="#home" href="#home">
                        <img src="../images/logo.png" alt="" width="40px">
                    </a>
                </div>

            </div>

            <!-- menu de navegacion -->
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul id="nav" class="nav navbar-nav">
                        <li class="scroll"><a href="#pagina principal" data-section="#home">pagina prinipal</a></li>
                        <li class="scroll"><a href="#sobre nosotros" data-section="#about">sobre nostros</a></li>
                        <li class="scroll"><a href="#caracteristicas" data-section="#features">Nuestros Horarios</a></li>
                        <li class="scroll"><a href="#donde nos encontramos" data-section="#services">Nuestros servicios</a></li>
                        <li class="scroll"><a href="#imagenes" data-section="#portfolio">imagenes</a></li>
                        <li class="scroll"><a href="#contact" data-section="#contact-area">Contacto</a></li>
                        <li><a href="../Login/Acceso.php">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </nav>
            <!-- /menu de navegacion-->

        </div>
    </header>
    <?php
    if (isset($_GET["correo"]) && $_GET["correo"] == "exito") {
        header("refresh:7; url=Inicio.php");
    ?>
        <section id="cta2">
            <div class="container">
                <div class="text-center">
                    <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Correo electrónico actualizado</h2>
                </div>
            </div>
        </section>
        <?php
    } else {
        if (isset($_GET["correo"]) && $_GET["correo"] == "fallo") {
            header("refresh:7; url=Inicio.php");
        ?>
            <section id="cta2">
                <div class="container">
                    <div class="text-center">
                        <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Contacta con nosotros lo antes posible, hubo un error con el correo</h2>
                    </div>
                </div>
            </section>
    <?php
        }
    }
    ?>
    <!-- carrusel-->
    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(../images/slider/arcadia1.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2> <span>Bienvenidos a Game Sivar</span></h2>
                                    <p>Listos para la diversion...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(../images/slider/arcadia2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2> <span>Bienvenidos a Game Sivar</span></h2>
                                    <p>Listos para la adrenalina...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(../images/slider/arcadia3.png);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2> <span>Bienvenidos a Game Sivar</span></h2>
                                    <p>Listos para la felicidad...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->

        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->
    <!-- /carrucel-->
    <section id="about">
        <div class="container">



            <div class="row">


                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Más sobre nosotros </h3>
                    <p>Game siver nace de la de diversion en nuestro pais como sabemos una de las caracteristicas mas grandes es la familia y los niños y es de ahi donde game sivar En nuestro parque de juegos, nos esforzamos por ofrecer una experiencia emocionante y segura para personas de todas las edades. Nuestro parque está diseñado para brindar diversión inolvidable a nuestros visitantes. Nuestro compromiso con la seguridad se refleja en cada aspecto de nuestras operaciones, desde el mantenimiento riguroso de maquinas hasta la capacitación continua de nuestro personal. ¡Ven y únete a nosotros para vivir momentos de alegría y aventura junto a tu familia que estas esperando!</p>
                </div>
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="../images/logo.png" alt="">
                </div>
            </div>
        </div>
    </section><!--/#about-->



    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nuestro Horarios</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="../images/imagen.jpg" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <p><img class="img-thumbnail" src="../images/ico/horarios (1).png" alt=""></p>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Horarios Martes y Juves</h4>
                            <p>Abrimos de 8 de la manaña a 4.30 de la Tarde </p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <p><img class="img-thumbnail" src="../images/ico/horarios (1).png" alt=""></p>

                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Horarios Sabodo y Domingo</h4>
                            <p>Abrimos de 9 de la manaña a 10 de la noche </p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <p><img class="img-thumbnail" src="../images/ico/ubicacion (1).png" alt=""></p>

                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Donde estamos ubicados</h4>
                            <p> 34°9'15.4"N 118°19'39.7"W - Estas coordenadas representan el Observatorio Griffith en Los Ángeles, California, EE. UU</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Más sobre nosotros </h2>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nuestro servicos</h2>
                <p class="text-center wow fadeInDown">Contamos con una amplia variedad de servicios como</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="features-item">
                            <p><img class="img-thumbnail" src="../images/ico/comida-rapida (1).png" alt=""></p>
                            <h3 class="features-title font-alt">Comida </h3>
                            Contamos con un amplio menu como comida rapida golicinas y mas.
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="features-item">
                            <p><img class="img-thumbnail" src="../images/ico/estacionamiento (1).png" alt=""></p>
                            <h3 class="features-title font-alt">Estacionamiento</h3>
                            Contamos con parqueo en la sucursal.
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="features-item">
                            <p><img class="img-thumbnail" src="../images/ico/carrusel (1).png" alt=""></p>
                            <h3 class="features-title font-alt">juegos</h3>
                            Contamos con diferentes juegos de maquinas para los mas grandes y pequeños.
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="features-item">
                            <p><img class="img-thumbnail" src="../images/ico/pista-de-baile (1).png" alt=""></p>
                            <h3 class="features-title font-alt">Salon de fiesta</h3>
                            Adicionalemente contamos con un salon defiesta que tenemos a tu disposicion.
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

    <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">imágenes</h2>

            </div>



            <div class="portfolio-items">

                <div class="portfolio-item animation">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="../images/portfolio/img1.png" alt="">
                        <div class="portfolio-info">
                            <h3>Familia</h3>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item animation">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="../images/portfolio/img2.png" alt="">
                        <div class="portfolio-info">
                            <h3>Diversión</h3>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item animation">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="../images/portfolio/img3.png" alt="">
                        <div class="portfolio-info">
                            <h3>Experiencia</h3>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item animation">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="../images/portfolio/img4.png" alt="">
                        <div class="portfolio-info">
                            <h3>Recreacion</h3>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
                <div class="portfolio-item animation">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="../images/portfolio/img5.png" alt="">
                        <div class="portfolio-info">
                            <h3>Juegos</h3>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item animation">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="../images/portfolio/img6.png" alt="">
                        <div class="portfolio-info">
                            <h3>Aventura</h3>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
            </div>
        </div>
        </div><!--/.portfolio-item-->


        </div>
        </div><!--/.portfolio-item-->
        </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->







    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <p><img class="img-circle img-thumbnail" src="../images/comentarios/mujer (1).png" alt=""></p>
                                <h4>Luisa Morales</h4>
                                <small>enero 2024</small>
                                <p>La verdad es un buen lugar para disfrutar con los niños un ambiente muy agradable y alegre.</p>
                            </div>
                            <div class="item">
                                <p><img class="img-circle img-thumbnail" src="../images/comentarios/hombre (1).png" alt=""></p>
                                <h4>Emelio Reyes</h4>
                                <small>marzo 2022</small>
                                <p>Es un buen lugar para pasar con la familia amplia variedad de juegos y la comida tambien es muy rica.</p>
                            </div>

                            <div class="item">
                                <p><img class="img-circle img-thumbnail" src="../images/comentarios/trabajo-en-equipo (1).png" alt=""></p>
                                <h4>Luis diaz. </h4>
                                <small>2024</small>
                                <p>Super recomendado el lugar las intalaciones cuenta con un ambiente familiar y el personal es muy amable.</p>
                            </div>
                        </div>

                        <!-- Controls -->
                        <div class="btns">
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#testimonial-->





    <section id="contact-area">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Mas informacion</h2>

                </div>
                <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Asunto</label>
                            <input type="text" id="asunto" name="asunto" class="form-control" placeholder="Subject" required>
                        </div>

                    </div>
                    <div class="col-lg-6 animated animate-from-right" style="opacity: 1; right: 0px;">
                        <div class="form-group">
                            <label for="mensaje">Enviar mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">

                        <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Enviar</button>

                    </div>

                </form>

            </div>
        </div>

    </section><!--/#bottom-->

    <?php require("../HeaderFooter/footer.php"); ?>
</body>

</html>