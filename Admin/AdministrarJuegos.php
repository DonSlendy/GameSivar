<?php
//Conectando a base de datos
$con = new mysqli("localhost", "root", "", "catedra_dss");
//Verificar si la conexión fue exitosa
if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
$con->set_charset("utf8");
$qr = "SELECT * FROM juegos";
$sql = $con->prepare($qr);

$sql->execute();
$resultado = $sql->get_result();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrar Juegos</title>
    <?php include("../HeaderFooter/cabezal.php"); ?>
</head><!--/head-->

<body id="home" class="homepage">
    <?php include("navbar.php"); ?>
    <?php
    if (isset($_GET["juego"]) && $_GET["juego"] == "exito") {
        header("refresh:7; url=AdministrarJuegos.php");
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
    if (isset($_GET["juego"]) && $_GET["juego"] == "fallo") {
        header("refresh:7; url=AdministrarJuegos.php");
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
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Aquí se encuentran todos los <span>JUEGOS</span> disponibles.</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Modificala a tu gusto por si tienes cambios pendientes por hacer.<br />
                    Puedes agregar juegos, editarlos o eliminarlos si han tenido algún desperfecto.</p>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">CRUD Juegoss</h2>
            </div>
            <div class="col-lg-6">
                <form id="main-contact-form" name="contact-form" method="post" action="CrearEditarJuego.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="descrip">Descripción</label>
                        <input minlength="105" maxlength="106" type="text" id="descrip" name="descrip" class="form-control" placeholder="Descripción" required>
                    </div>

                    <div class="form-group">
                        <label for="desarro">Desarrollador</label>
                        <input type="text" id="desarro" name="desarro" class="form-control" placeholder="Desarrollador" required>
                    </div>

                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" id="genero" name="genero" class="form-control" placeholder="Desarrollador" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option class="form-control" value="Mecánico">Juego mecánico</option>
                            <option class="form-control" value="Digital">Juego Digital</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="precio">Puntos</label>
                        <input type="text" id="puntos" name="puntos" value="5" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" value="3.5" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option class="form-control" value="desactivado">Desactivar juego</option>
                            <option class="form-control" value="activo">Juego disponible</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control">
                    </div>

                    <input type="text" id="id" name="id" value="">

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive" style="max-height: 765px; overflow-y: auto;">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Desarrollador</th>
                                <th>Género</th>
                                <th>Tipo</th>
                                <th>Puntos</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Imagen</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <!-- Ejemplo de datos ingresados -->
                        <tbody>
                            <?php
                            while ($juegos = $resultado->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $juegos['id_juegos'] ?></td>
                                    <td><?php echo $juegos['nombre_juegos'] ?></td>
                                    <td><?php echo $juegos['descripcion_juegos'] ?></td>
                                    <td><?php echo $juegos['desarrollador_juegos'] ?></td>
                                    <td><?php echo $juegos['genero_juegos'] ?></td>
                                    <td><?php echo $juegos['precio_juegos'] ?></td>
                                    <td><?php echo $juegos['tipo_juegos'] ?></td>
                                    <td><?php echo $juegos['puntos_juegos'] ?></td>
                                    <td><?php echo $juegos['estado_juegos'] ?></td>
                                    <td><?php echo '<img width="70px" src="data:image/jpeg;base64,' . base64_encode($juegos['imagen_juegos']) . '">'; ?></td>
                                    <td>

                                        <?php echo "<button style='width:100%'' type='button' class='btn btn-warning btn-sm' onclick='editar(\"" .
                                            htmlspecialchars($juegos["id_juegos"]) . "\", \"" .
                                            htmlspecialchars($juegos['nombre_juegos']) . "\", \"" .
                                            htmlspecialchars($juegos['descripcion_juegos']) . "\", \"" .
                                            htmlspecialchars($juegos['desarrollador_juegos']) . "\", \"" .
                                            htmlspecialchars($juegos['genero_juegos']) . "\", \"" .
                                            htmlspecialchars($juegos['precio_juegos']) . "\", \"" .
                                            htmlspecialchars($juegos['tipo_juegos']) . "\", \"" .
                                            htmlspecialchars($juegos['puntos_juegos']) . "\", \"" .
                                            htmlspecialchars($juegos['estado_juegos']) . "\")'>Editar</button>" ?>

                                        <form method="POST" action="EliminarJuego.php">
                                            <button style="width:100%" type="submit" name="btnEliminar" value="<?php echo $juegos['id_juegos'] ?>" class="btn btn-danger btn-sm">
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
    function editar(id, nombre, descrip, desarro, genero, precio, tipo, puntos, estado) {
        document.getElementById("id").value = id;
        document.getElementById("name").value = nombre;
        document.getElementById("descrip").value = descrip;
        document.getElementById("desarro").value = desarro;
        document.getElementById("genero").value = genero;
        document.getElementById("tipo").value = tipo;
        document.getElementById("puntos").value = puntos;
        document.getElementById("precio").value = precio;
        document.getElementById("estado").value = estado;
    }
    document.addEventListener("DOMContentLoaded", function() {
        var tipoSelect = document.getElementById("tipo");
        var puntosInput = document.getElementById("puntos");
        var precioInput = document.getElementById("precio");

        // Escuchar cambios en el select
        tipoSelect.addEventListener("change", function() {
            var tipoSeleccionado = tipoSelect.value;

            // Actualizar valores de puntos y precio según el tipo seleccionado
            if (tipoSeleccionado === "Digital") {
                puntosInput.value = "3";
                precioInput.value = "2";
            } else if (tipoSeleccionado === "Mecánico") {
                puntosInput.value = "5";
                precioInput.value = "3.5";
            }
        });
    });
</script>
<!---->

</html>