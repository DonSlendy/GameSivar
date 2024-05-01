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
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Venta de tarjetas</title>
    <?php require("../HeaderFooter/cabezal.php") ?>

</head>

<body id="home" class="homepage">
    <?php require("navbar.php"); ?>


    <section id="cta2">
        <?php
        if (isset($_GET["venta"]) && $_GET["venta"] == "exito") {
            header("refresh:7; url=VentadePremios.php");
        ?>
            <div class="text-center" style="background-color: #72c05b;">
                <h2 style="color: whitesmoke;" class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Canje realizado</h2>
            </div>
            <?php
        } else {
            if (isset($_GET["venta"]) && $_GET["venta"] == "fallo") {
                header("refresh:7; url=VentadePremios.php");
            ?>
                <div class="text-center" style="background-color: #ce2f35;">
                    <h2 style="color: whitesmoke;" class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Contacta con un administrador, hubo un error con el canje</h2>
                </div>
        <?php
            }
        }
        ?>
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Formulario para el <span>CANJE DE PREMIOS</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Ingresa los datos del cliente para su canje.<br />Toma el dato que coincida con la descripción del cliente para aprobar el canje.</p>
            </div>
        </div>
    </section>

    <?php if ($resultado->num_rows > 0) { ?>
        <section id="contact-area">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Ingresa los datos acá:</h2>
                    </div>
                    <form id="main-contact-form" name="contact-form" method="post" action="InsertarV_Premio.php">
                        <div class="col-lg-12 animated animate-from-left" style="opacity: 1; left: 0px;">
                            <div class="form-group">
                                <label for="email">Correo del Cliente</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Procesar Compra</button>
                            <button id="limpiar" type="button" class="btn btn-primary btn-lg btn-send-msg" onclick="limpiarFormulario()">Limpiar</button>
                        </div><br>
                        <div class="col-lg-12 animated animate-from-right" style="opacity: 1; right: 0px;">
                            <table class="table table-dark table-bordered">
                                <thead>
                                    <th>ID</th>
                                    <th scope="col">Nombre del Premio</th>
                                    <th scope="col">Coste del Premio</th>
                                    <th scope="col">Cantidad disponible</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Seleccionar</th>
                                </thead>
                                <tbody>
                                    <?php while ($premios = $resultado->fetch_assoc()) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $premios['id_premios'] ?></th>
                                            <td><?php echo $premios['nombre_premios'] ?></td>
                                            <td><?php echo $premios['costo_premios'] ?></td>
                                            <td><?php echo $premios['cantidad_premios'] ?></td>
                                            <td align="center"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($premios['imagen_premios']) . '" width="150px" height="140px">' ?></td>
                                            <td>
                                                <input type="radio" id="label_<?php echo $premios['id_premios'] ?>" name="rdbSelect" value="<?php echo $premios['id_premios'] ?>" onchange="actualizarCosto(<?php echo $premios['id_premios'] ?>)">
                                                <label for="label_<?php echo $premios['id_premios'] ?>" style="margin-left: 5px;">Seleccionar</label>
                                            </td>
                                        </tr>
                                        <input type="hidden" id="costo_<?php echo $premios['id_premios'] ?>" name="costo_premio" value="<?php echo $premios['costo_premios'] ?>">
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <input type="hidden" id="costo_seleccionado" name="costo_seleccionado">
                        </div>
                    </form>


        </section>
    <?php } else { ?>
        <section id="portfolio">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown">No hay premios disponibles</h2>
                    <p class="text-center wow fadeInDown">Parece que se agotaron las existencias de premios en la base, notificale al administrador que agregue nuevos productos para su canje</p>
                </div>
            </div>
        </section>
    <?php } ?>
    <script src="../js/VentaDePremios.js"></script>
    <?php require("../HeaderFooter/footer.php"); ?>
</body>

</html>