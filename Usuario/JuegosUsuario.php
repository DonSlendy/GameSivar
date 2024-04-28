<!DOCTYPE html>
<html lang="es">

<head>
    <title>Usar un Juegp</title>
    <?php include("../HeaderFooter/cabezal.php"); ?>
    <link rel="stylesheet" href="../css/Juegos.css">
</head>

<body id="home" class="homepage">
    <?php include("navbar.php"); ?>

    <?php
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    $qr = "SELECT * FROM juegos WHERE estado_juegos = 'activo'";
    $sql = $con->prepare($qr);

    $sql->execute();
    $resultado = $sql->get_result();
    ?>

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">¡Llegó la hora! Es momento de<span> JUGAR</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Tienes el acceso en un solo sitio para poder usar todos tus juegos.<br />Elije el que más te guste, esperamos que tengas muchas horas de diversión.</p>
            </div>
        </div>
    </section>

    <?php if ($resultado->num_rows > 0) {
    ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <form method="POST" action="comprarJuego.php">
                <?php
                while ($juegos = $resultado->fetch_assoc()) {
                    echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($juegos['imagen_juegos']) . '">';
                }
                $sql->close();
                ?>
                <!--
        <div class="col">
            <div class="card">
                <a align="center"><img src="../images/mario.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title">Super mario galaxy 2</h5>
                    <p class="card-text">
                        sigue la aventura que Mario realiza para derrotar al malvado Bowser en el espacio
                        exterior, donde capturó a la Princesa Peach y tomó el control del Cosmos.
                    </p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Desarrollador: Nintendo</li>
                        <li class="list-group-item">Genero: Plataformeo</li>
                        <li class="list-group-item">$30.00</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Adquierelo</a>
                    </div>
                </div>
            </div>
        </div>
    -->
            </form>
        </div>
    <?php } else { ?>
        <section id="portfolio">
            <div class="container">
                <div class="section-header">
                    <?php echo $_SESSION['idUserSe'] ?>
                    <h2 class="section-title text-center wow fadeInDown">Agregaremos próximamente más juegos</h2>
                    <p class="text-center wow fadeInDown">Parece que no has encontrado juegos, no te preocupes, estamos modificando nuestros inventarios para renovar el catálogo de videojuegos</p>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php include("../HeaderFooter/footer.php"); ?>
</body>