<?php
//Conectando a base de datos
$con = new mysqli("localhost", "root", "", "catedra_dss");
//Verificar si la conexión fue exitosa
if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
$con->set_charset("utf8");
$qr = "SELECT * FROM premios";
$sql = $con->prepare($qr);

$sql->execute();
$resultado = $sql->get_result();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrar Premios</title>
    <?php include("../HeaderFooter/cabezal.php"); ?>
</head><!--/head-->

<body id="home" class="homepage">
    <?php include("navbar.php"); ?>
    <?php
    if (isset($_GET["premio"]) && $_GET["premio"] == "exito") {
        header("refresh:7; url=AdministrarPremios.php");
    ?>
        <section id="cta2">
            <div class="container">
                <div class="text-center">
                    <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Acción realizada</h2>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <?php
    if (isset($_GET["premio"]) && $_GET["premio"] == "fallo") {
        header("refresh:7; url=AdministrarPremios.php");
    ?>
        <section id="cta2">
            <div class="container">
                <div class="text-center">
                    <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Acción no realizada</h2>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Aquí se encuentran todos los <span>PREMIOS</span> disponibles.</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Modificala a tu gusto por si tienes cambios pendientes por hacer.<br />
                    Puedes agregar premios, editarlos o eliminarlos si no se pedirán más.</p>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">CRUD Empleado</h2>
            </div>
            <div class="col-lg-6">
                <form id="main-contact-form" name="contact-form" method="post" action="CrearEditarPremio.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input type="number" id="costo" name="costo" class="form-control" placeholder="Costo" required>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option class="form-control" value="desactivado">Desactivar premio</option>
                            <option class="form-control" value="activo">Premio disponible</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese un número" required>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control">
                    </div>

                    <input type="hidden" id="id" name="id" value="">

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive" style="max-height: 445px; overflow-y: auto;">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Estado</th>
                                <th>Cantidad</th>
                                <th>Imagen</th>
                                <th>Opiones</th>
                            </tr>
                        </thead>
                        <!-- Ejemplo de datos ingresados -->
                        <tbody>
                            <?php
                            while ($premios = $resultado->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $premios['id_premios'] ?></td>
                                    <td><?php echo $premios['nombre_premios'] ?></td>
                                    <td><?php echo $premios['costo_premios'] ?></td>
                                    <td><?php echo $premios['estado_premios'] ?></td>
                                    <td><?php echo $premios['cantidad_premios'] ?></td>
                                    <td><?php echo '<img width="70px" src="data:image/jpeg;base64,' . base64_encode($premios['imagen_premios']) . '">'; ?></td>
                                    <td>

                                        <?php echo "<button style='width:100%'' type='button' class='btn btn-warning btn-sm' onclick='editar(\"" .
                                            htmlspecialchars($premios["id_premios"]) . "\", \"" .
                                            htmlspecialchars($premios['nombre_premios']) . "\", \"" .
                                            htmlspecialchars($premios['costo_premios']) . "\", \"" .
                                            htmlspecialchars($premios['estado_premios']) . "\", \"" .
                                            htmlspecialchars($premios['cantidad_premios']) . "\")'>Editar</button>" ?>

                                        <form method="POST" action="EliminarPremio.php">
                                            <button style="width:100%" type="submit" name="btnEliminar" value="<?php echo $premios['id_premios'] ?>" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php  }
                            ?>

                    </table>
                </div>
            </div>


        </div>
        <!-- Tabla de ventas -->
    </div><br>
    <?php include("../HeaderFooter/footer.php"); ?>
</body>
<script>
    function editar(id, nombre, costo, estado, cantidad) {
        document.getElementById("id").value = id;
        document.getElementById("name").value = nombre;
        document.getElementById("costo").value = costo;
        document.getElementById("estado").value = estado;
        document.getElementById("cantidad").value = cantidad;
    }
</script>

</html>