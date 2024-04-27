<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tus datos</title>
    <?php include("../HeaderFooter/cabezal.php") ?>
</head>

<body id="home" class="homepage">
    <?php include("navbar.php"); ?>

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Aquí se encuentra la información de tu <span>USUARIO</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Modificala a tu gusto por si algo cambió desde el día que creaste la cuenta.<br />
                    Recerda cambiar la contraseña si la recuperaste recientemente.</p>
            </div>
        </div>
    </section>
    <section id="contact-area" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Tus datos personales</h2>
                    <p class="text-center wow fadeInDown animated" style="visibility: visible;">Modifica lo que gustes y envíalo cuando finalices.</p>
                </div>
                
                <form id="main-contact-form" method="post" action="enviarModificacion.php">
                    <div class="col-lg-12 animated animate-from-left" style="opacity: 1; left: 0px;">

                        <div class="form-group">
                            <label for="name">Nombres de Usuario</label>
                            <input value="<?php echo $_SESSION['soloNombreSe'] ?>" id="name" type="text" name="name" class="form-control" placeholder="Nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Apellidos de Usuario</label>
                            <input value="<?php echo $_SESSION['soloApellidoSe'] ?>" id="apellidos" type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input value="<?php echo $_SESSION['correoSe'] ?>" type="email" id="email" name="email" class="form-control" placeholder="gamesivar@correos.com" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Contraseña</label>
                            <input value="<?php echo $_SESSION['contraSe'] ?>" type="password" id="contra" name="contra" class="form-control" placeholder="**********" required>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Actualizar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </section><!--/#bottom-->

    <?php require("../HeaderFooter/footer.php"); ?>
</body>

</html>