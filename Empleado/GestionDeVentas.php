<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../HeaderFooter/cabezal.php"); ?>
    <title>Gestión de Ventas - Cliente</title>
    <link rel="stylesheet" href="../css/GestionDeVentas.css">
</head>

<body>
    <?php include("navbar.php"); ?>
    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Administración de ventas y tarjetas para el<span> EMPLEADO</span></h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Encuentra la información necesaria para crear tus estadísticas <br />y cumplir con las tareas de tu puesto laboral.</p>
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
                    <div class="table-responsive">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Contraseña</th>
                                    <th>Cargo</th>
                                    <th>Fecha de contratación</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                </tr>
                            </thead>
                            <!-- Ejemplo de datos ingresados -->
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Doe</td>
                                    <td>*******</td>
                                    <td>Chalan</td>
                                    <td>10/10/2014</td>
                                    <td>123 Main St.</td>
                                    <td>123-456-7890</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 id="titulosform" class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Clientes que realizan más compras en esta semana</h2>
                    <div class="table-responsive">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Contraseña</th>
                                    <th>Cargo</th>
                                    <th>Fecha de contratación</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                </tr>
                            </thead>
                            <!-- Ejemplo de datos ingresados -->
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Doe</td>
                                    <td>*******</td>
                                    <td>Chalan</td>
                                    <td>10/10/2014</td>
                                    <td>123 Main St.</td>
                                    <td>123-456-7890</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include("../HeaderFooter/footer.php"); ?>
</body>

</html>