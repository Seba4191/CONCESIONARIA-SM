<?php
include("conexionBase.php");

$patente=isset($_GET['patente']) ? htmlspecialchars($_GET['patente']) : 'GWU918';

$sql="SELECT * from vehiculos2 where patente='$patente'";

$stmt = $dbh->prepare($sql);

$stmt->setFetchMode(PDO::FETCH_ASSOC);

try {
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error en la ejecución de la consulta: " . $e->getMessage();
    exit();
}

$vehiculos = [];

while ($fila = $stmt->fetch()) {
    $objAutos = new stdClass();
    $objAutos->patente = $fila['patente'];
    $objAutos->marca = $fila['marca'];
    $objAutos->modelo = $fila['modelo'];
    $objAutos->anio = $fila['anio'];
    $objAutos->FechaPatentado = $fila['fechaPatentado'];
    $objAutos->partido = $fila['partidoRadicado'];
   
    
    array_push($vehiculos, $objAutos);
}

$dbh = null;

$objVehiculos = new stdClass();
$objVehiculos->vehiculos = $vehiculos;
$objVehiculos->cuenta = count($vehiculos);

$salidaJson = json_encode($objVehiculos);

echo $salidaJson;


?>