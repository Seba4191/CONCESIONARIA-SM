<?php

include("conexionBase.php");

// Construimos la sentencia SQL con los filtros proporcionados
$sql = "SELECT * FROM marcas";
// Preparamos la sentencia
$stmt = $dbh->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

// Ejecutamos la sentencia
try {
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error en la ejecución de la consulta: " . $e->getMessage();
    exit();
}
$aMarcas = [];


while ($fila = $stmt->fetch()) {
    
        
        $objMarc = new stdClass();
        $objMarc->nombreMarca=$fila['nombreMarca'];
       
        
    array_push($aMarcas, $objMarc);
}
$dbh = null;

$objM =new stdClass();
$objM->marcas = $aMarcas;
$objM->cuenta = count($aMarcas);

$salidaJson = json_encode($objM);



echo $salidaJson;
?>


