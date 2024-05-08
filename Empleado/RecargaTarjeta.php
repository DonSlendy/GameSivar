<!DOCTYPE html>
<html lang="es">

<head>
    <title>Recarga de Tarjetas</title>
    <?php require("../HeaderFooter/cabezal.php") ?>

</head>

<body id="home" class="homepage">
    <?php require("navbar.php"); ?>
    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Aplicar una <span>RECARGA</span> a tus tarjetas</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Puedes reutilizar las mismas tarjetas, no es necesario que compres nuevas, puedes agregarles más saldo.</p>
            </div>
        </div>
    </section>

    <body>
        <section id="contact-area">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Ingresa los datos acá:</h2>
                    </div>
                    <form id="main-contact-form" name="contact-form" method="post" action="ActualizarSaldo.php" class="form-center">
                        <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">
                            <div class="form-group">
                                <label for="tarjeta">Coloca el Id de la tarjeta:</label>
                                <input type="text" id="tarjeta" name="tarjeta" class="form-control" required>
                            </div>


                        </div>
                        <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">
                            <div class="form-group">
                                <label for="abonar">Ingresa la cantidad que quieres recargar:</label>
                                <input type="number" id="abonar" name="abonar" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section><!--/#bottom-->

        <?php require("../HeaderFooter/footer.php"); ?>
    </body>

</html>