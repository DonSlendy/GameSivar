<?php
//Inicio la sesión
session_start();
//Comprueba si el usuario está autenticado, haciendo uso de 
//la variable de sesión $_SESSION['autenticado']
if ($_SESSION["autenticadoUser"] == "si") {
    //No es necesario realizar acción alguna
} else {
    //si el usuario no está autenticado 
    //redirigirlo a la página de inicio de sesión
    header("Location: ../Login/Acceso.php");
    //salimos de este script
    exit();
}
