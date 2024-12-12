<?php
session_start(); 


if (isset($_SESSION['identificativo'])) {    
    session_destroy();
}
header('Location: ./formLogin.php');
exit();

?>