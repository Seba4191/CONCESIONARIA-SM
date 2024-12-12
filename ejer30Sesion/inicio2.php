<?php
session_start();
    
if (!isset($_SESSION['identificativo'])) {
    header('Location: formLogin.php');
    exit();
} 
else {
    echo "<h2> Bienvenido</h2>";
    echo "<h2> Informacion de la Sesión</h2>";
    echo "<h3> Identificativo de sesion: " . $_SESSION['identificativo'] . "</h3>";
    echo "<h3> Nombre de usuario: " . $_SESSION['nombreUsuario'] . "</h3>";
    echo "<h3> Contraseña encriptada: " . $_SESSION['contra'] . "</h3>";
    echo "<h3> Contraseña: " . $_SESSION['contraOriginal'] . "</h3>";
    echo "<h3> Número de inicios de sesión: " . $_SESSION['contador'] . "</h3>";

    echo "<p><button onClick=\"location.href='./app_modulo1'\">Ingrese a la aplicación</button><p>";
    echo "<p><button onClick=\"location.href='./destruirSesion.php'\">Terminar sesión</button><p>";
}  
    
?>