<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tus tarjetas</title>
    <?php require("../HeaderFooter/cabezal.php") ?>
    <link rel="stylesheet" href="../css/Tarjetas.css">
</head>

<body id="home" class="homepage">
    <?php require("navbar.php"); ?>

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Aquí se almacenan todas las compras de tus <span>TARJETAS</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Tienes el acceso en un solo sitio para controlar tus tarjetas.<br />También puedes transferir los puntos a tu usuario para canjear los premios.</p>
            </div>
        </div>
    </section>

    <div class="d-flex flex-wrap">

        <div class="card text-bg-dark">
        <img src="../images/Gold.jpg" class="card-img" alt="Imagen de la tarjeta">
            <div class="card-img-overlay">
                <h5 class="card-title">XXXXXXX</h5>
                <p class="card-text">
                    Tarjeta Gold<br><br>
                    Saldo actual: 300$
                </p>
                <p class="card-points">
                    XX Pt
                </p>
                <button class="btnCanje">Canjear puntos</button><br><br>
                <h5 class="card-footer">Vence en XX/XX/XXXX - Activa</h5>
            </div>
        </div>

        <div class="card text-bg-dark">
            <img src="../images/Silver.jpg" class="card-img" alt="Imagen de la tarjeta">
            <div class="card-img-overlay">
                <h5 class="card-title">XXXXXXX</h5>
                <p class="card-text">
                    Tarjeta Silver<br><br>
                    Saldo actual: 200$
                </p>
                <p class="card-points">
                    XX Pt
                </p>
                <button class="btnCanje">Canjear puntos</button><br><br>
                <h5 class="card-footer">Vence en XX/XX/XXXX - Activa</h5>
            </div>
        </div>

        <div class="card text-bg-dark">
            <img src="../images/Plus.jpg" class="card-img" alt="Imagen de la tarjeta">
            <div class="card-img-overlay">
                <h5 class="card-title">XXXXXXX</h5>
                <p class="card-text">
                    Tarjeta Plus<br><br>
                    Saldo actual: 50$
                </p>
                <p class="card-points">
                    XX Pt
                </p>
                <button class="btnCanje">Canjear puntos</button><br><br>
                <h5 class="card-footer">Vence en XX/XX/XXXX - Activa</h5>
            </div>
        </div>
    </div>

    <?php require("../HeaderFooter/footer.php"); ?>
</body>

</html>