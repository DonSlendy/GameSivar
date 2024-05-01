<?php
//Conectando a base de datos
$con = new mysqli("localhost", "root", "", "catedra_dss");
//Verificar si la conexión fue exitosa
if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
$con->set_charset("utf8");
$qr = "SELECT * FROM premios WHERE estado_premios = 'activo'";
$sql = $con->prepare($qr);

$sql->execute();
$resultado = $sql->get_result();
$sql->close();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ver premios</title>
    <?php include("../HeaderFooter/cabezal.php"); ?>
</head>

<body id="home" class="homepage">
    <header id="top-header" class="navbar-inverse navbar-fixed-top">
        <?php include("navbar.php"); ?>
    </header>
    <!-- carrusel-->
    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"> ¿Tu ya acumulaste tus puntos? <br><span>Vamos a recoger esos premios</span></h2>
            </div>
        </div>
    </section>
    <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Solicita el canje de premios con nuestros trabajadores</h2>
            </div>


            <!--AÑADI ETIQUETA SECTION QUE ABARCA TODAS LAS CARDS-->
            <section class="section_card">
    <?php if ($resultado->num_rows > 0) {
        while ($premios = $resultado->fetch_assoc()) { ?>
            
                <div class="card">
                    <div class="face front">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($premios['imagen_premios']) . '"> alt=>'; ?>
                    </div>
                    <div class="face back">
                        <h3><?php echo $premios['nombre_premios'] ?></h3>
                        <p>Tendras las posibilidad de ganar este premio por la cantidad de </p>
                        <div class="link">
                            <a href="#"><?php echo $premios['costo_premios'] ?> puntos</a>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>
            </section>
        <?php } else { ?>
            <section id="portfolio">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-title text-center wow fadeInDown">Agregaremos próximamente más juegos</h2>
                        <p class="text-center wow fadeInDown">Parece que no has encontrado juegos, no te preocupes, estamos modificando nuestros inventarios para renovar el catálogo de videojuegos</p>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php include("../HeaderFooter/footer.php") ?>
</body>

</html>