<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../HeaderFooter/cabezal.php"); ?>
    <title>Gestión de Ventas - Empleado</title>
    <link rel="stylesheet" href="../css/GestionDeVentas.css">
</head>

<body>
    <?php include("navbar.php"); ?>

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Administración de ventas y tarjetas para el<span> ADMIN</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Encuentra la información necesaria para crear tus estadísticas y cumplir con las tareas de tu puesto laboral.</p>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Información de nuestros clientes</h2>
            <p class="text-center wow fadeInDown">Administra toda la información de ventas de los clientes, encuentra en las tablas presentes todos los datos de ventas y compras que realizan, ordenados de más a menos</p>
        </div>
        <div class="row" id="fondoGDV">
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 id="titulosform" class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Transacciones realizadas en esta semana</h2>
                    <div class="table-responsive" id="Gestion">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>ID de Transacción</th>
                                    <th>Tipo de Transacción</th>
                                    <th>Costo de Transacción</th>
                                    <th>Fecha de transacción</th>
                                    <th>Persona que la hizo</th>
                                    <th>Tarjeta de la persona</th>
                                    <th>Correo de la persona</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servername = "localhost"; // Cambiar según tu configuración
                                $username = "root";
                                $password = "";
                                $dbname = "catedra_dss";

                                // Crear conexión
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Chequear conexión
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Obtener el inicio de la semana (lunes)
                                $inicioSemana = date('Y-m-d', strtotime('monday this week'));

                                // Obtener la fecha actual
                                $fechaActual = date('Y-m-d');

                                $sql = "SELECT t.id_transacciones, t.tipo_transacciones, t.costo_transacciones, t.fecha_transacciones, u.nombre_usuarios, t.id_tarjetas, u.correo_usuarios
                        FROM transacciones t
                        LEFT JOIN usuarios u ON t.id_tarjetas = u.id_usuarios
                        WHERE fecha_transacciones BETWEEN '$inicioSemana' AND '$fechaActual'
                        ORDER BY fecha_transacciones DESC";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id_transacciones"] . "</td>";
                                        echo "<td>" . $row["tipo_transacciones"] . "</td>";
                                        echo "<td>$" . number_format($row["costo_transacciones"], 2) . "</td>";
                                        echo "<td>" . $row["fecha_transacciones"] . "</td>";
                                        echo "<td>" . $row["nombre_usuarios"] . "</td>";
                                        echo "<td>" . $row["id_tarjetas"] . "</td>";
                                        echo "<td>" . $row["correo_usuarios"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No se encontraron registros esta semana</td></tr>";
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 id="titulosform" class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Clientes que realizan más compras en esta semana</h2>
                    <div class="table-responsive" id="Gestion">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>ID Usuario</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Apellido de Usuario</th>
                                    <th>Transacciones realizadas</th>
                                    <th>Total comprado</th>
                                    <th>Transacción favorita</th>
                                    <th>Correo electrónico</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servername = "localhost"; // Cambiar según tu configuración
                                $username = "root";
                                $password = "";
                                $dbname = "catedra_dss";

                                // Crear conexión
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Chequear conexión
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Obtener el inicio de la semana (lunes)
                                $inicioSemana = date('Y-m-d', strtotime('monday this week'));

                                // Obtener la fecha actual
                                $fechaActual = date('Y-m-d');

                                $sql = "SELECT u.id_usuarios, u.nombre_usuarios, u.apellidos_usuarios, COUNT(t.id_transacciones) AS transacciones_realizadas, SUM(t.costo_transacciones) AS total_comprado, MAX(t.tipo_transacciones) AS transaccion_favorita, u.correo_usuarios
                                            FROM usuarios u
                                            LEFT JOIN transacciones t ON u.id_usuarios = t.id_tarjetas
                                            WHERE t.fecha_transacciones BETWEEN '$inicioSemana' AND '$fechaActual'
                                            GROUP BY u.id_usuarios
                                            ORDER BY transacciones_realizadas DESC";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id_usuarios"] . "</td>";
                                        echo "<td>" . $row["nombre_usuarios"] . "</td>";
                                        echo "<td>" . $row["apellidos_usuarios"] . "</td>";
                                        echo "<td>" . $row["transacciones_realizadas"] . "</td>";
                                        echo "<td>$" . number_format($row["total_comprado"], 2) . "</td>";
                                        echo "<td>" . $row["transaccion_favorita"] . "</td>";
                                        echo "<td>" . $row["correo_usuarios"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No se encontraron registros de usuarios esta semana</td></tr>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div div class="row" id="fondoGDV">
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 id="titulosform" class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Inventario de productos</h2>
                    <div class="table-responsive" id="Gestion">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>ID Premio</th>
                                    <th>Nombre del Premio</th>
                                    <th>Costo</th>
                                    <th>Estado</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "catedra_dss";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Consulta para obtener información de los juegos
                                $sql_premios = "SELECT * from premios";
                                $result_premios = $conn->query($sql_premios);

                                if ($result_premios->num_rows > 0) {
                                    while ($row_premios = $result_premios->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row_premios["id_premios"] . "</td>";
                                        echo "<td>" . $row_premios["nombre_premios"] . "</td>";
                                        echo "<td>" . $row_premios["costo_premios"] . "</td>";
                                        echo "<td>" . $row_premios["estado_premios"] . "</td>";
                                        echo "<td>" . $row_premios["cantidad_premios"] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 id="titulosform" class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Venta de tarjetas</h2>
                </div>
                <div id="contenedorTarjetas">
                    <div class="InfoTarjeta" id="Positivo">
                        <?php
                        $sql_most_sold = "SELECT id_tarjetas, COUNT(*) AS num_transacciones FROM transacciones GROUP BY id_tarjetas ORDER BY num_transacciones DESC LIMIT 1";
                        $result_most_sold = $conn->query($sql_most_sold);

                        if ($result_most_sold->num_rows > 0) {
                            $row_most_sold = $result_most_sold->fetch_assoc();
                            echo "<h1 id='titulosform' style='margin-top: 10px;' align='center'>Tarjeta más vendida: " . $row_most_sold["id_tarjetas"] . "<br>Total de veces vendida: " . $row_most_sold["num_transacciones"] . "</h1>";
                        } else {
                            echo "<h1 id='titulosform' style='margin-top: 10px;' align='center'>No hay información disponible</h1>";
                        }
                        ?>
                    </div>
                    <div class="InfoTarjeta" id="Negativo">
                        <?php
                        $sql_least_sold = "SELECT id_tarjetas, COUNT(*) AS num_transacciones FROM transacciones GROUP BY id_tarjetas ORDER BY num_transacciones ASC LIMIT 1";
                        $result_least_sold = $conn->query($sql_least_sold);

                        if ($result_least_sold->num_rows > 0) {
                            $row_least_sold = $result_least_sold->fetch_assoc();
                            echo "<h1 id='titulosform' style='margin-top: 10px;' align='center'>Tarjeta menos vendida: " . $row_least_sold["id_tarjetas"] . "<br>Total de veces vendida: " . $row_least_sold["num_transacciones"] . "</h1>";
                        } else {
                            echo "<h1 id='titulosform' style='margin-top: 10px;' align='center'>No hay información disponible</h1>";
                        }

                        // Cerrar conexión
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../HeaderFooter/footer.php"); ?>
    </div>
</body>

</html>