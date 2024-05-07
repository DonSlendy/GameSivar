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

    <!-- Nuevo empleado -->
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Nuevo Empleado</h2>
            </div>
            <div class="col-lg-6">
                <form id="main-contact-form" name="contact-form" method="post" action="/Admin/InsertarEmpleado.php">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="nombre" class="form-control" placeholder="Nombre" required>
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
                        <label for="correo">Correo electronico</label>
                        <input type="Email" id="correo" name="correo" class="form-control" placeholder="gamersiver@gmail.com" required>
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
                        <?php
                        // Establecer la conexión a la base de datos
                        $host = "localhost";
                        $db_name = "catedra_dss";
                        $username = "root";
                        $password = "";

                        $conn = new mysqli($host, $username, $password, $db_name);

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Error en la conexión a la base de datos: " . $conn->connect_error);
                        }

                        // Consulta SQL para obtener todos los empleados
                        $query = "SELECT nombre_usuarios, apellidos_usuarios, contraseña_usuarios, correo_usuarios, id_usuarios FROM usuarios WHERE tipo_usuarios = 'empleado'";
                        $result = $conn->query($query);

                        // Mostrar los datos en la tabla
                        if ($result->num_rows > 0) {
                            echo "<tr><th>Nombre</th><th>Apellido</th><th>Contraseña</th><th>Correo electrónico</th><th>Opciones</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['nombre_usuarios'] . "</td>";
                                echo "<td>" . $row['apellidos_usuarios'] . "</td>";
                                echo "<td>" . $row['contraseña_usuarios'] . "</td>";
                                echo "<td>" . $row['correo_usuarios'] . "</td>";
                                echo "<td><a href='/Admin/EditarEmpleado.php?id=" . $row['id_usuarios'] . "' class='btn btn-primary btn-sm me-2'>Editar</a>
                                <form method='post' action='eliminarEmpleado.php'>
                                <input type='hidden' name='id_empleado' value='" . $row['id_usuarios'] . "'>
                                <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este empleado?\")'>Eliminar</button>
                            </form></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No hay empleados registrados";
                        }

                        // Cerrar la conexión
                        $conn->close();
        ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div><br>
    <?php include("../HeaderFooter/footer.php"); ?>
</body>

</html>
