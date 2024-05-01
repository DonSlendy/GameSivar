<?php
// Verificar si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el correo electrónico del formulario
    $correo = $_POST['email'];
    $idPremio = isset($_POST['rdbSelect']) ? $_POST['rdbSelect'] : "No";
    $costos = $_POST['costo_seleccionado'];

    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");

    // Verificar la conexión
    if ($con->connect_error) {
        die("Error en la conexión a la base de datos: " . $con->connect_error);
    }

    // Consultar si existe el usuario a partir del correo electrónico y obtener sus puntos
    $sql_user = "SELECT puntos_usuarios, id_usuarios FROM usuarios WHERE correo_usuarios = '$correo'";
    $result_user = $con->query($sql_user);

    if ($result_user->num_rows > 0 && $id != "No") {
        $row_user = $result_user->fetch_assoc();
        $puntos = $row_user["puntos_usuarios"];
        $id_usuarios = $row_user['id_usuarios'];

        if ($costos > $puntos) {
            header("Location: VentadePremios.php?venta=fallo");
        } else {
            // Insertar los datos del canje de puntos en la tabla 'premios_usuarios'
            $sql_insert = "INSERT INTO premios_usuarios (id_premios, id_usuarios) VALUES 
            ('$idPremio', '$id_usuarios')";

            if ($con->query($sql_insert) === TRUE) {
                header("Location: VentaDePremios.php?venta=exito");
            } else {
                header("Location: VentaDePremios.php?venta=fallo");
            }
        }
    } else {
        // El correo no existe en la tabla de usuarios, mostrar mensaje de error
        header("Location: VentadePremios.php?venta=fallo");
    }

    // Cerrar la conexión a la base de datos
    $con->close();
} else {
    header("Location: VentaDePremios.php");
}
