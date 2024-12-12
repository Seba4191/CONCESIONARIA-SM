<?php

    $respuesta_estado="";

    $dbname = "autos";
    $host = "127.0.0.1"; 
    $user = "root";
    $password = "";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password); /* Database Handle */
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $respuesta_estado = "GOODD ";
    } catch (PDOException $e) {
        $respuesta_estado = "Error " . $e->getMessage();
        
    }
    echo $respuesta_estado;


?>