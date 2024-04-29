<!DOCTYPE html>
<html lang="es">

<head>
    <title>Usar un Juego</title>
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
    $sql->close();

    $id = $_SESSION['idUserSe'];

    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    $qr = "SELECT id_tarjetas FROM tarjetas WHERE propietario_tarjetas = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("i", $id);
    $sql->execute();
    $resultado2 = $sql->get_result();
    $sql->close();
    ?>

    <section id="cta2">
        <?php
        if (isset($_GET["venta"]) && $_GET["venta"] == "exito") {
            header("refresh:7; url=JuegosUsuario.php");
        ?>
            <div class="text-center" style="background-color: #72c05b;">
                <h2 style="color: whitesmoke;" class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Venta realizada</h2>
            </div>
            <?php
        } else {
            if (isset($_GET["venta"]) && $_GET["venta"] == "fallo") {
                header("refresh:7; url=JuegosUsuario.php");
            ?>
                <div class="text-center" style="background-color: #ce2f35;">
                    <h2 style="color: whitesmoke;" class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Contacta con nosotros lo antes posible, hubo un error con la venta</h2>
                </div>
        <?php
            }
        }
        ?>
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">¡Llegó la hora! Es momento de<span> JUGAR</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Tienes el acceso en un solo sitio para poder usar todos tus juegos.<br />Elije el que más te guste, esperamos que tengas muchas horas de diversión.</p>
            </div>
        </div>
    </section>

    <?php
    // Almacenar los resultados del segundo conjunto de resultados en una matriz
    $tarjetas_array = [];
    while ($tarjetas = $resultado2->fetch_assoc()) {
        $tarjetas_array[] = $tarjetas;
    }
    ?>
    <?php if ($resultado->num_rows > 0) {
        // Almacenar las opciones del select en una variable
        $opciones_select = '';
        if (!empty($tarjetas_array)) {
            foreach ($tarjetas_array as $tarjeta) {
                $opciones_select .= "<option value=" . $tarjeta['id_tarjetas'] . ">" . $tarjeta['id_tarjetas'] . "</option>";
            }
        }
    ?>
        <form method="POST" action="comprarJuego.php">
            <div class="row" id="rowJuegos">
                <?php
                while ($juegos = $resultado->fetch_assoc()) { ?>
                <input type="hidden" name="precio" value="<?php echo $juegos['precio_juegos'] ?>">
                    <div class="card">
                        <?php echo '<a align="center"><img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($juegos['imagen_juegos']) . '"></a>'; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $juegos['nombre_juegos'] ?></h5>
                            <p class="card-text"><?php echo $juegos['descripcion_juegos'] ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Desarrollador: <?php echo $juegos['desarrollador_juegos'] ?></li>
                                <li class="list-group-item">Genero: <?php echo $juegos['genero_juegos'] ?></li>
                                <li class="list-group-item">Precio: $<?php echo $juegos['precio_juegos'] ?></li>
                            </ul>
                            <?php
                            if (!empty($tarjetas_array)) {
                                // Iterar sobre la matriz de tarjetas para mostrar el select
                                echo '<select name="tarjetaUser_' . $juegos['id_juegos'] . '" class="form-control" requerid>';
                                echo $opciones_select;
                                echo '</select>';
                            } else {
                                echo '<input type="text" disabled value="No tienes tarjetas">';
                            }
                            ?>
                            <p align="center">
                                <button type="submit" name="btnCompra" value="<?php echo $juegos['id_juegos']; ?>">
                                    Comprar
                                </button>
                            </p>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </form>
        <?php var_dump($tarjetas_array); ?>
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