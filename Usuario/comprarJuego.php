<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario
    if (isset($_POST['btnCompra'])) {
        // Obtener el ID del juego seleccionado
        $id_juego = $_POST['btnCompra'];

        // Obtener el ID de la tarjeta seleccionada para este juego específico
        $nombre_tarjeta = "tarjetaUser_" . $id_juego; // Nombre del campo en el formulario
        $id_tarjeta = $_POST[$nombre_tarjeta];

        $precio = $_POST['precio'];
        $saldo_tarjetas = 0;

        $con = new mysqli("localhost", "root", "", "catedra_dss");
        //Verificar si la conexión fue exitosa
        if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
        $con->set_charset("utf8");

        $qr = "SELECT saldo_tarjetas FROM tarjetas WHERE id_tarjetas = ?";
        $sql = $con->prepare($qr);
        $sql->bind_param("s", $id_tarjeta);
        $sql->execute();
        //Asociando a variables los datos solicitados en la consulta SELECT
        $sql->bind_result($saldo_tarjetas);
        $sql->fetch();
        $sql->close();

        if ($saldo_tarjetas < $precio) {
            header("Location: JuegosUsuario.php?venta=fallo");
        } else {
            if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
            $con->set_charset("utf8");
            $qr = "INSERT INTO tarjetas_juegos (id_tarjetas, id_juegos) VALUES (?, ?);";
            $sql = $con->prepare($qr);
            $sql->bind_param("si", $id_tarjeta, $id_juego);
            $sql->execute();

            if ($sql->affected_rows > 0) {
                header("Location: JuegosUsuario.php?venta=exito");
            } else {
                header("Location: JuegosUsuario.php?venta=fallo");
            }
        }
        /*
        $con = new mysqli("localhost", "root", "", "catedra_dss");
        //Verificar si la conexión fue exitosa
        */
    }
} else {
    header("Location: JuegosUsuario.php?venta=fallo");
}
?>