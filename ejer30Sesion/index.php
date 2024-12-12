<?php
session_start();

if (!isset($_SESSION['identificativo'])) {
    header('Location: formLogin.php');
    exit();
} 
else {
    echo( "ENTRE AL INDEX");
    header('location:app_modulo1/index.php');
}
?>
