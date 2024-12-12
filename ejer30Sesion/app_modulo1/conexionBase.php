<?php
Session_start();
if(!isset($_SESSION['identificativo'])) {
    header('location:../index.php');
    exit();
}    
$dbname = "autos";
$host = "127.0.0.1"; 
$user = "root";
$password = "";
$respuesta_error = "";
try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password); 
    
    
} catch (PDOException $e) {
    $respuesta_error = date('Y-m-d H:i:s') ."Error " . $e->getMessage()."\n";     
        error_log($respuesta_error, 3, "./error.log");  
    
}

?>