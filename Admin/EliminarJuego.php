<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");

    $btnEliminar = $_POST['btnEliminar'];

    $qr = "DELETE FROM juegos WHERE id_juegos = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("i", $btnEliminar);

    if ($sql->execute() > 0) {
        header("Location: AdministrarJuegos.php?juego=exito");
    } else {
        header("Location: AdministrarJuegos.php?juego=fallo");
    }
}
