<?php
require_once 'datos/conexion.php';
require_once 'UsuarioDAO.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el nombre de usuario y la contraseña del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar si el usuario existe en la base de datos
    if (UsuarioDAO::existeUsuario($username, $password)) {
        // Autenticación exitosa, redirigir al menú
        header("Location: menu.html");
        exit();
    } else {
        // Autenticación fallida, redirigir al formulario de inicio de sesión con un mensaje de error
        header("Location: index.html?error=1");
        exit();
    }
}
?>
