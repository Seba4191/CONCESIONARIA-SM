<?php
session_start();
    
if (!isset($_SESSION['identificativo'])) {
    header('Location: formLogin.php');
    exit();
} 
else {
    $identificador= $_SESSION['identificativo'] ;
     $usuario=$_SESSION['nombreUsuario'] ;
     $contraseña=$_SESSION['contra'] ;
     $contraOriginal=$_SESSION['contraOriginal'] ;
     $=$_SESSION['contador'] ;

    
}  
    
?>