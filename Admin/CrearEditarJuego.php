<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    //Escapar datos del formulario
    $name = $con->real_escape_string(trim($_POST['name']));
    $descrip = $con->real_escape_string(trim($_POST['descrip']));
    $desarro = $con->real_escape_string(trim($_POST['desarro']));
    $genero = $con->real_escape_string(trim($_POST['genero']));
    $tipo = $con->real_escape_string(trim($_POST['tipo']));
    $puntos = $con->real_escape_string(trim($_POST['puntos']));
    $precio = $con->real_escape_string(trim($_POST['precio']));
    $estado = $con->real_escape_string(trim($_POST['estado']));

    $imagen = $_FILES['imagen']['tmp_name'];
    $file_type = $_FILES['imagen']['type'];

    $id = $con->real_escape_string(trim($_POST['id']));

    if ($id == "") {
        if ($imagen == "") {
            header("Location: AdministrarJuegos.php?juego=fallo");
        } else {
            $allowed_types = ['image/jpeg', 'image/jpg'];
            if (!in_array($file_type, $allowed_types)) {
                header("Location: AdministrarJuegos.php?juego=fallo");
            }
            $imagenData = file_get_contents($imagen);
            $qr = "INSERT INTO juegos 
            (nombre_juegos,descripcion_juegos,desarrollador_juegos,genero_juegos,precio_juegos,tipo_juegos,puntos_juegos,estado_juegos,imagen_juegos) 
            VALUES (?,?,?,?,?,?,?,?,?)";
            $sql = $con->prepare($qr);
            $sql->bind_param("ssssdsiss", $name, $descrip, $desarro, $genero, $precio, $tipo, $puntos, $estado, $imagenData);

            if ($sql->execute() > 0) {
                header("Location: AdministrarJuegos.php?juego=exito");
            } else {
                header("Location: AdministrarJuegos.php?juego=fallo");
            }
        }
    } else {
        if ($imagen == "") {
            $qr = "UPDATE juegos SET 
            nombre_juegos = ?, descripcion_juegos = ?, desarrollador_juegos = ?, genero_juegos = ?,
            precio_juegos = ?, tipo_juegos = ?, puntos_juegos = ?, estado_juegos = ?
            WHERE id_juegos = ?";
            $sql = $con->prepare($qr);
            $sql->bind_param("ssssdsisi", $name, $descrip, $desarro, $genero, $precio, $tipo, $puntos, $estado, $id);
        } else {
            $allowed_types = ['image/jpeg', 'image/jpg'];
            if (!in_array($file_type, $allowed_types)) {
                header("Location: AdministrarJuegos.php?juego=fallo");
            }
            $imagenData = file_get_contents($imagen);

            $qr = "UPDATE juegos SET 
            nombre_juegos = ?, descripcion_juegos = ?, desarrollador_juegos = ?, genero_juegos = ?,
            precio_juegos = ?, tipo_juegos = ?, puntos_juegos = ?, estado_juegos = ?, imagen_juegos = ?
            WHERE id_juegos = ?";
            $sql = $con->prepare($qr);
            $sql->bind_param("ssssdsissi", $name, $descrip, $desarro, $genero, $precio, $tipo, $puntos, $estado, $imagenData, $id);
        }
        if ($sql->execute() > 0) {
            header("Location: AdministrarJuegos.php?juego=exito");
        } else {
            header("Location: AdministrarJuegos.php?juego=fallo");
        }
    }
}
