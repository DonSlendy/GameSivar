<?php
// Verifica si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_empleado'])) {
    // Obtener los datos del formulario
    $id_empleado = $_POST['id_empleado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contraseña = $_POST['contraseña'];
    $correo = $_POST['correo'];

    //Conexión a base de datos 
	$conn = new mysqli("localhost", "root", "", "catedra_dss");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Consulta SQL para actualizar los datos del empleado
    $query = "UPDATE usuarios SET nombre_usuarios = '$nombre', apellidos_usuarios = '$apellido', contraseña_usuarios = '$contraseña', correo_usuarios = '$correo' WHERE id_usuarios = $id_empleado";

    if ($conn->query($query) === TRUE) {
       // Redirigir a index.php con los datos incluidos en la URL
			header("Location:AdministrarEmpleados.php");
			exit();
    } else {
        echo "Error al actualizar los datos del empleado: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "No se recibió ningún dato del formulario de edición.";
}
?>