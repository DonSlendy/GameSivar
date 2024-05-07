<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrar Empleados</title>
    <?php include("../HeaderFooter/cabezal.php"); ?>
</head><!--/head-->

<body id="home" class="homepage">
    <?php include("navbar.php"); ?>
    <!-- Primera imagen slinder-->
    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Aquí se encuentran todos tus <span>EMPLEADOS</span>.</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Modificala a su gusto por si algo cambió desde el primer día.<br />
                    Recuerda que los datos privados de tus empleados son tu responsabildad.</p>
            </div>
        </div>
    </section>

    <?php
    // Verifica si se ha enviado el ID del empleado
    if (isset($_GET['id'])) {
        // Obtener el ID del empleado de la URL
        $id_empleado = $_GET['id'];

        //Conexión a base de datos 
		$conn = new mysqli("localhost", "root", "", "catedra_dss");

        //Verificamos la conexión 
        if($conn->connect_error){
            die("Eror en la conexión a la base de datos: " . $conn->connect_error);
        }


        // Consulta SQL para obtener los datos del empleado con el ID especificado
        $query = "SELECT * FROM usuarios WHERE id_usuarios = $id_empleado";
        $result = $conn->query($query);

        // Verificar si se encontró el empleado
        if ($result->num_rows > 0) {
            // Obtener los datos del empleado
            $empleado = $result->fetch_assoc();
            $nombre = $empleado['nombre_usuarios'];
            $apellido = $empleado['apellidos_usuarios'];
            $contraseña = $empleado['contraseña_usuarios'];
            $correo = $empleado['correo_usuarios'];?>
    <!-- Editar empleado -->
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Editar Empleado</h2>
            </div>
            <div class="col-lg-6">
                <!-- Mostrar el formulario con los datos del empleado prellenados -->
                <form id="main-contact-form" name="contact-form" method="post" action="guardarEmpleadoEditado.php">
                    <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">
                    <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
                        <div class="form-group">
                                <label for="name">Nombre</label>
                                <input id="name" type="text" name="nombre" class="form-control" placeholder="Nombre" required  value="<?php echo $nombre; ?>">
                        </div>

                        <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required value="<?php echo $apellido; ?>">
                        </div>

                        <div class="form-group">
                                <label for="name">Contraseña</label>
                                <input id="Contraseña" type="password" name="contraseña" class="form-control" placeholder="Contraseña" required value="<?php echo $contraseña; ?>">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electronico</label>
                            <input type="Email" id="correo" name="correo" class="form-control" placeholder="gamersiver@gmail.com" required value="<?php echo $correo; ?>">
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">

                          <button type="submit" class="btn btn-success btn-lg btn-send-msg">Guardar</button>

                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive">
                   <img src="../images/w-1.jpg" width="500px">
                </div>
            </div>
        </div>
        <?php
        } else {
            echo "No se encontró ningún empleado con el ID especificado.";
        }
    
        // Cerrar la conexión
        $conn->close();
    } else{
        echo "No se encontró ningún empleado con el ID especificado";
    }?>
</div><br>
    <?php include("../HeaderFooter/footer.php"); ?>
</body>

</html>