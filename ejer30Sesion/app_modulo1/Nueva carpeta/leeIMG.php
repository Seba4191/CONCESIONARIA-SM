<?php
include("conexionBase.php");

$patente=isset($_GET['patente']) ? htmlspecialchars($_GET['patente']) : '';

$sql="select imagenVehiculo from vehiculos2 where patente='$patente'";

$stmt = $dbh->prepare($sql);

$stmt->setFetchMode(PDO::FETCH_ASSOC);

// Ejecutamos la sentencia
try {
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error en la ejecución de la consulta: " . $e->getMessage();
    exit();
}

$imagenes=[];
    $objImagen = new stdClass();
while ($fila = $stmt->fetch()) {
    
    $objImagen->imagenVehiculo=base64_encode($fila['imagenVehiculo']);   
       
}

$dbh = null;




$salidaJson = json_encode($objImagen,JSON_INVALID_UTF8_SUBSTITUTE);

echo $salidaJson;


?>