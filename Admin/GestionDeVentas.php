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
                            <!-- Ejemplo de datos ingresados -->
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Juego</td>
                                    <td>$3.00</td>
                                    <td>02/22/2024</td>
                                    <td>Julio</td>
                                    <td>JV09888</td>
                                    <td>julio@correo.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Compra</td>
                                    <td>$300.00</td>
                                    <td>27/03/2024</td>
                                    <td>Gabriela</td>
                                    <td>GA25101</td>
                                    <td>gabriela@correo.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Compra</td>
                                    <td>$50.00</td>
                                    <td>01/15/2024</td>
                                    <td>Sofía</td>
                                    <td>SL07845</td>
                                    <td>sofía@correo.com</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Recarga</td>
                                    <td>$40.00</td>
                                    <td>01/01/2024</td>
                                    <td>Eduardo</td>
                                    <td>EC21547</td>
                                    <td>eduardo@correo.com</td>
                                </tr>
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
                            <!-- Ejemplo de datos ingresados -->
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gabriela</td>
                                    <td>Arias</td>
                                    <td>1</td>
                                    <td>$300.00</td>
                                    <td>Compra</td>
                                    <td>gabriela@correo.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sofía</td>
                                    <td>Larín</td>
                                    <td>1</td>
                                    <td>$50.00</td>
                                    <td>Compra</td>
                                    <td>sofia@correo.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Eduardo</td>
                                    <td>Cortez</td>
                                    <td>1</td>
                                    <td>$40.00</td>
                                    <td>Recarga</td>
                                    <td>eduardo@correo.com</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Julio</td>
                                    <td>Villanueba</td>
                                    <td>1</td>
                                    <td>$3.00</td>
                                    <td>Juego</td>
                                    <td>julio@correo.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 id="titulosform" class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Inventario de productos</h2>
                    <div class="table-responsive" id="Gestion">
                        <table class="table mt-5">
                            <table class="table mt-5">
                                <thead>
                                    <tr>
                                        <th>ID producto</th>
                                        <th>Nombre del producto</th>
                                        <th>Cantidad disponible</th>
                                    </tr>
                                </thead>
                                <!-- Ejemplo de datos ingresados -->
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tarjeta Gold</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tarjeta Silver</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Tarjeta Plus</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Tablets</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Camisas</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Calcomanias</td>
                                        <td>56</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Peluches</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Carros</td>
                                        <td>11</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Yoyos</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Gorras</td>
                                        <td>3</td>
                                    </tr>
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
                        <h1 id="titulosform" style="margin-top: 10px;" align="center">Tarjeta más vendida: Plus<br>Total de veces vendida: 10</h1>
                    </div>
                    <div class="InfoTarjeta" id="Negativo">
                        <h1 id="titulosform" style="margin-top: 10px;" align="center">Tarjeta menos vendida: Gold<br>Total de veces vendida: 2</h1>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <?php include("../HeaderFooter/footer.php"); ?>

</body>

</html>