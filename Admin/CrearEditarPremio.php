<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    //Escapar datos del formulario
    $name = $con->real_escape_string(trim($_POST['name']));
    $costo = $con->real_escape_string(trim($_POST['costo']));
    $estado = $con->real_escape_string(trim($_POST['estado']));
    $cantidad = $con->real_escape_string(trim($_POST['cantidad']));

    $imagen = $_FILES['imagen']['tmp_name'];
    $file_type = $_FILES['imagen']['type'];

    $id = $con->real_escape_string(trim($_POST['id']));
    if ($id == "") {
        if ($imagen == "") {
            header("Location: AdministrarPremios.php?premio=fallo");
        } else {
            $allowed_types = ['image/jpeg', 'image/jpg'];
            if (!in_array($file_type, $allowed_types)) {
                header("Location: AdministrarPremios.php?premio=fallo");
            }
            $imagenData = file_get_contents($imagen);
            $qr = "INSERT INTO 
            premios (nombre_premios,costo_premios,estado_premios,cantidad_premios,imagen_premios) 
            VALUES (?,?,?,?,?)";
            $sql = $con->prepare($qr);
            $sql->bind_param("sisis", $name, $costo, $estado, $cantidad, $imagenData);

            if ($sql->execute() > 0) {
                header("Location: AdministrarPremios.php?premio=exito");
            } else {
                header("Location: AdministrarPremios.php?premio=fallo");
            }
        }
    } else {
        if ($imagen == "") {
            $qr = "UPDATE premios 
            SET nombre_premios = ?, costo_premios = ?, estado_premios = ?, cantidad_premios = ?
            WHERE id_premios = ?";
            $sql = $con->prepare($qr);
            $sql->bind_param("sisii", $name, $costo, $estado, $cantidad, $id);
        } else {
            $allowed_types = ['image/jpeg', 'image/jpg'];
            if (!in_array($file_type, $allowed_types)) {
                header("Location: AdministrarPremios.php?premio=fallo");
            }
            $imagenData = file_get_contents($imagen);

            $qr = "UPDATE premios 
            SET nombre_premios = ?, costo_premios = ?, estado_premios = ?, 
            cantidad_premios = ?, imagen_premios = ?
            WHERE id_premios = ?";
            $sql = $con->prepare($qr);
            $sql->bind_param("sisisi", $name, $costo, $estado, $cantidad, $imagenData, $id);
        }
        if ($sql->execute() > 0) {
            header("Location: AdministrarPremios.php?premio=exito");
        } else {
            header("Location: AdministrarPremios.php?premio=fallo");
        }
    }
}
/* */