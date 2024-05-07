<?php
//Verificar si se ha enviado el ID del empleado a eliminar 
if(isset($_POST['id_empleado'])){
    //Obtener el ID del empleado a eliminar
    $id_empleado = $_POST['id_empleado'];

    //Conexión a base de datos 
	$conn = new mysqli("localhost", "root", "", "catedra_dss");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    //Consulta SQL para eliminar el empleado 
    $query = "DELETE FROM usuarios WHERE id_usuarios = $id_empleado";

    //Ejecuetamos la consulta 
    if($conn->query($query)== TRUE){
        // Redirigir a index.php con los datos incluidos en la URL
			header("Location:AdministrarEmpleados.php");
			exit();
    }else {
        echo "Error al eliminar el empleado: " . $conn->error;
    }
 
    // Cerrar la conexión
    $conn->close();
}else {
    echo "No se ha especificado ningún ID de empleado para eliminar.";
}
?>