<?php
// Verificar si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el correo electrónico del formulario
    $correo = $_POST['email'];

    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");

    // Verificar la conexión
    if ($con->connect_error) {
        die("Error en la conexión a la base de datos: " . $con->connect_error);
    }

    // Consultar el nombre y apellido del usuario a partir del correo electrónico
    $sql_user = "SELECT nombre_usuarios, apellidos_usuarios FROM usuarios WHERE correo_usuarios = '$correo'";
    $result_user = $con->query($sql_user);

    if ($result_user->num_rows > 0) {
        $row_user = $result_user->fetch_assoc();
        $nombre = $row_user["nombre_usuarios"];
        $apellido = $row_user["apellidos_usuarios"];

        // Generar un código automático para la tarjeta
        $id_tarjetas = strtoupper(substr($nombre, 0, 1) . substr($apellido, 0, 1));
        $id_tarjetas .= rand(10000, 99999); // Agregar cinco números aleatorios

        $precio_tarjeta = $_POST['product'];
        // Obtener otros datos del formulario
        switch ($precio_tarjeta) {
            case 300:
                $tipo_tarjeta = "Gold";
                break;
            case 150:
                $tipo_tarjeta = "Silver";
                break;
            case 50:
                $tipo_tarjeta = "Plus";
                break;
            default:
                break;
        }
        $limite_tarjeta = $precio_tarjeta; // El límite de la tarjeta es igual al precio seleccionado
        $saldo_tarjeta = $precio_tarjeta; // El saldo inicial es igual al precio seleccionado
        $vencimiento_tarjeta = date('Y-m-d', strtotime('+1 year')); // Vencimiento predeterminado: un año después de la fecha actual
        $puntos_tarjeta = 0; // Puntos iniciales: 0
        $estado_tarjeta = 'activo'; // Estado predeterminado: activo

        // Insertar los datos de la nueva tarjeta en la tabla 'tarjetas'
        $sql_insert = "INSERT INTO tarjetas (id_tarjetas, tipo_tarjetas, limite_tarjetas, saldo_tarjetas, vencimiento_tarjetas, propietario_tarjetas, puntos_tarjetas, estado_tarjetas)
                       VALUES ('$id_tarjetas', '$tipo_tarjeta', $limite_tarjeta, $saldo_tarjeta, '$vencimiento_tarjeta', (SELECT id_usuarios FROM usuarios WHERE correo_usuarios = '$correo'), $puntos_tarjeta, '$estado_tarjeta')";

        if ($con->query($sql_insert) === TRUE) {
            header("Location: VentadeTarjetas.php?venta=exito");
        } else {
            header("Location: VentadeTarjetas.php?venta=fallo");
        }
    } else {
        // El correo no existe en la tabla de usuarios, mostrar mensaje de error
        header("Location: VentadeTarjetas.php?venta=fallo");
    }

    // Cerrar la conexión a la base de datos
    $con->close();
}
