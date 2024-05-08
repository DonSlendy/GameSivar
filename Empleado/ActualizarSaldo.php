<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    //Escapar datos del formulario
    $tarjeta = $con->real_escape_string(trim($_POST['tarjeta']));
    $abonar = $con->real_escape_string(trim($_POST['abonar']));

    $qr = "SELECT limite_tarjetas, saldo_tarjetas, propietario_tarjetas FROM tarjetas WHERE id_tarjetas = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("s", $tarjeta);

    $sql->execute();

    $sql->bind_result($limite, $saldo, $propietario);
    $limite2 = 0;
    $saldo2 = 0;
    $propietario2 = 0;
    $nuevoSaldo = 0;
    if ($sql->fetch()) {
        $limite2 = $limite;
        $saldo2 = $saldo;
        $propietario2 = $propietario;
    }
    $sql->close();

    if (($saldo2 + $abonar) > $limite2) {
        //No hacer transacción
        header("Location: RecargaTarjeta.php?recarga=fallo");
    } else {
        //hacer transacción
        $nuevoSaldo = $saldo2 + $abonar;

        $qr = "UPDATE tarjetas SET saldo_tarjetas = ? WHERE id_tarjetas = ?";
        $sql = $con->prepare($qr);
        $sql->bind_param("ds", $nuevoSaldo, $tarjeta);

        if ($sql->execute()) {
            //Hacer inserción en Transacciones
            $qr = "INSERT INTO transacciones 
            (tipo_transacciones, costo_transacciones,fecha_transacciones,id_tarjetas,id_usuarios)
            VALUES ('Ven_Saldo', ?, NOW(), ?, ?)";
            $sql = $con->prepare($qr);
            $sql->bind_param("dsi", $abonar, $tarjeta, $propietario2);
            $sql->execute();
            header("Location: RecargaTarjeta.php?recarga=exito");
        } else {
            header("Location: RecargaTarjeta.php?recarga=fallo");
        }
    }
}
/* */