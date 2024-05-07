<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrar Empleados</title>
    <?php include("../HeaderFooter/cabezal.php"); ?>
</head><!--/head-->

<body id="home" class="homepage">
    <?php include("navbar.php"); ?>
    <!-- Primera imagen slinder-->
    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(../images/slider/bg1.png);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2>GAMER<span>SIVAR</span>.</h2>
                                    <p>Deja que con los juegos tu mente vuele</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Segunda imagen slinder-->
            <div class="item" style="background-image: url(../images/slider/gb2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2>GAMER<span>SIVAR</span>.</h2>
                                    <p>Deja que con los juegos tu mente vuele</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Tercera imagen slinder-->
            <div class="item" style="background-image: url(../images/slider/gb3.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2>GAMER<span>SIVAR</span>.</h2>
                                    <p>Deja que con los juegos tu mente vuele</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Venta de tarjetas -->
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Nuevo Empleado</h2>
            </div>
            <div class="col-lg-6">
                <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Contraseña</label>
                        <input id="Contraseña" type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Cargo</label>
                        <input id="cargo" type="text" name="cargo" class="form-control" placeholder="Vendedor" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha de contratación</label>
                        <input type="date" id="fechaC" name="fechaC" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo electronico</label>
                        <input type="Email" id="correo" name="correo" class="form-control" placeholder="gamersiver@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha de nacimiento</label>
                        <input type="date" id="fechaN" name="fechaN" class="form-control" required>
                    </div>

                    <div class="clearfix"></div>
                    <div class="text-center">

                        <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Enviar</button>

                    </div>
                </form>
            </div>
            <div class="col-lg-6">
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
                                <th>Correo electrónico</th>
                                <th>Fecha de nacimiento</th>
                                <th>Opiones</th>
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
                                <td>john.doe@example.com</td>
                                <td>10/10/1999</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm me-2">Editar</button>
                                    <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <!-- Tabla de ventas -->
    </div><br>
    <?php include("../HeaderFooter/footer.php"); ?>
</body>

</html>