<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tus tarjetas</title>
    <?php require("../HeaderFooter/cabezal.php") ?>
    <link rel="stylesheet" href="../css/Tarjetas.css">
</head>

<body id="home" class="homepage">
    <?php require("navbar.php"); ?>
    <?php
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    $qr = "SELECT * FROM tarjetas WHERE propietario_tarjetas = ? AND estado_tarjetas = 'activo'";
    $sql = $con->prepare($qr);
    $num = $_SESSION['idUserSe'];
    $sql->bind_param("i", $num);
    $sql->execute();
    $resultado = $sql->get_result();
    ?>
    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Aquí se almacenan todas las compras de tus <span>TARJETAS</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Tienes el acceso en un solo sitio para controlar tus tarjetas.<br />También puedes transferir los puntos a tu usuario para canjear los premios.</p>
            </div>
        </div>
    </section>

    <?php if ($resultado->num_rows > 0) {
    ?>
        <form method="POST" action="canjearPuntos.php">
            <input type="hidden" value="<?php echo $_SESSION['puntosSe'] ?>" name="puntos">
            <div class="d-flex flex-wrap">
                <?php
                while ($tarjeta = $resultado->fetch_assoc()) { ?>
                    <div class="card text-bg-dark">
                        <img src="../images/<?php echo $tarjeta['tipo_tarjetas']; ?>.jpg" class="card-img" alt="Imagen de la tarjeta">
                        <div class="card-img-overlay">
                            <h5 class="card-title"><?php echo $tarjeta['id_tarjetas']; ?></h5>
                            <p class="card-text">
                                <?php echo "Tarjeta " . $tarjeta['tipo_tarjetas']; ?><br><br>
                                <?php echo "Saldo actual: $" . $tarjeta['saldo_tarjetas']; ?>
                            </p>
                            <p class="card-points">
                                <?php echo $tarjeta['puntos_tarjetas'] . " Pt"; ?>
                            </p>
                            <button class="btnCanje" name="canjePuntos" value="<?php echo $tarjeta['id_tarjetas']; ?>">
                                Canjear puntos
                            </button><br><br>
                            <h5 class="card-footer"><?php echo "Vence el " . $tarjeta['vencimiento_tarjetas']; ?></h5>
                        </div>
                    </div>
                <?php }
                $sql->close();
                ?>
            </div>
        </form>
    <?php } else { ?>
        <section id="portfolio">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown">No tienes tarjetas</h2>
                    <p class="text-center wow fadeInDown">Necesitas tarjetas para empezar a jugar, ve con un trabajador de la compañía para que pueda indicarte como obtener las tarjetas</p>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php require("../HeaderFooter/footer.php"); ?>
</body>

</html>