<?php

//Verificamos que se ha enviado la información 
if($_SERVER["REQUEST_METHOD"] == "POST"){


	//Conexión a base de datos 
		$conn = new mysqli("localhost", "root", "", "catedra_dss");

	//Verificamos la conexión 
	if($conn->connect_error){
		die("Eror en la conexión a la base de datos: " . $conn->connct_error);
	}

	//Obtenememos la información del formulario 
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$contraseña = $_POST['contraseña'];
	$correo = $_POST['correo'];


	//Consuta SQL para insertar empleado
	$query = "INSERT INTO usuarios (nombre_usuarios, apellidos_usuarios, contraseña_usuarios, correo_usuarios, tipo_usuarios) VALUES
	 ('$nombre', '$apellido', '$contraseña', '$correo', 'empleado')";

	try {
		// Ejecutamos la consulta
		if ($conn->query($query) === TRUE) {
			// Redirigir a index.php con los datos incluidos en la URL
			header("Location:AdministrarEmpleados.php");
			exit();
		} else {
			echo "Error al insertar el empleado: " . $conn->error;
		}
	} catch (Exception $e) {
		echo "Error al insertar el empleado: " . $e->getMessage();
	}

}

mysqli_close($conn); //Cerramos conexión  
	
?>