<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    //Escapar datos del formulario
    $email = $con->real_escape_string(trim($_POST['email']));
    $asunto = $con->real_escape_string(trim($_POST['asunto']));
    $message = $con->real_escape_string(trim($_POST['message']));
    $id = 0;

    $qr = "SELECT id_usuarios FROM usuarios WHERE correo_usuarios = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($id);

    $sql->fetch();

    if ($sql->num_rows > 0) {
        $qr = "INSERT INTO comentarios (id_usuarios,comentario,tipo_comentario,fecha_comentario) VALUES
               (?,?,?,NOW())";
        $sql = $con->prepare($qr);
        $sql->bind_param("iss", $id, $message, $asunto);

        if ($sql->execute() > 0) {
            header("Location: Inicio.php?comentario=exito");
        } else {
            header("Location: Inicio.php?comentario=fallo");
        }
    } else {
        header("Location: ../Login/Acceso.php");
    }
}
