<?php
include("conexionBase.php");

$orden = isset($_GET['orden']) ? htmlspecialchars($_GET['orden']) : '';
$f_patente = isset($_GET['patente']) ? htmlspecialchars($_GET['patente']) : '';
$f_marca = isset($_GET['marca']) ? htmlspecialchars($_GET['marca']) : '';
$f_modelo = isset($_GET['modelo']) ? htmlspecialchars($_GET['modelo']) : '';
$f_anio = isset($_GET['anio']) ? htmlspecialchars($_GET['anio']) : '';
$f_fechaPat = isset($_GET['fechaPat']) ? htmlspecialchars($_GET['fechaPat']) : '';
$f_partido = isset($_GET['partido']) ? htmlspecialchars($_GET['partido']) : '';

// Construimos la sentencia SQL con los filtros proporcionados
$sql = "SELECT * FROM vehiculos2 WHERE 1=1 ";
if (!empty($f_patente)) {
    $sql .= "AND patente LIKE CONCAT('%', :f_patente, '%') ";
}
if (!empty($f_marca)) {
    $sql .= "AND marca LIKE CONCAT('%', :f_marca, '%') ";
}
if (!empty($f_modelo)) {
    $sql .= "AND modelo LIKE CONCAT('%', :f_modelo, '%') ";
}
if (!empty($f_anio)) {
    $sql .= "AND anio LIKE CONCAT('%', :f_anio, '%') ";
}
if (!empty($f_fechaPat)) {
    $sql .= "AND `fechaPatentado` LIKE CONCAT('%', :f_fechaPat, '%') ";
}
if (!empty($f_partido)) {
    $sql .= "AND `partidoRadicado` LIKE CONCAT('%', :f_partido, '%') ";
}

if (!empty($orden)) {
    $sql .= "ORDER BY " . $orden;
} else {
    $sql .= "ORDER BY patente";  // Orden predeterminado
}

// Preparamos la sentencia
$stmt = $dbh->prepare($sql);

if (!empty($f_patente)) {
    $stmt->bindParam(':f_patente', $f_patente);
}
if (!empty($f_marca)) {
    $stmt->bindParam(':f_marca', $f_marca);
}
if (!empty($f_modelo)) {
    $stmt->bindParam(':f_modelo', $f_modelo);
}
if (!empty($f_anio)) {
    $stmt->bindParam(':f_anio', $f_anio);
}
if (!empty($f_fechaPat)) {
    $stmt->bindParam(':f_fechaPat', $f_fechaPat);
}
if (!empty($f_partido)) {
    $stmt->bindParam(':f_partido', $f_partido);
}

$stmt->setFetchMode(PDO::FETCH_ASSOC);

// Ejecutamos la sentencia
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





