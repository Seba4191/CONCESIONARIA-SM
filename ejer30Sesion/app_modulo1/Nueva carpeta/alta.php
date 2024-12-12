<?php
include("conexionBase.php");
$respuesta_estado = '';

$patente = isset($_POST['Fpatente']) ? htmlspecialchars($_POST['Fpatente']) : '';
$marca = isset($_POST['Fmarca']) ? htmlspecialchars($_POST['Fmarca']) : '';
$modelo = isset($_POST['Fmodelo']) ? htmlspecialchars($_POST['Fmodelo']) : '';
$anio = isset($_POST['Fanio']) ? htmlspecialchars($_POST['Fanio']) : '';
$fechaPat = isset($_POST['FfechaPat']) ? htmlspecialchars($_POST['FfechaPat']) : '';
$partido = isset($_POST['Fpartido']) ? htmlspecialchars($_POST['Fpartido']) : '';
$respuesta_estado="patente:".$patente.";marca:".$marca.";modelo:".$modelo.";anio:".$anio.";fechaPat:".$fechaPat.";partido:".$partido;


$sql = "INSERT INTO vehiculos2 (patente, marca, modelo, anio, fechaPatentado, partidoRadicado) VALUES (:Fpatente, :Fmarca, :Fmodelo, :Fanio, :FfechaPat, :Fpartido)";

try {
    $stmt = $dbh->prepare($sql);
    $respuesta_estado=$respuesta_estado."\n Preparacion exitosa.";
}
catch(PDOException $e){
    $respuesta_estado=$respuesta_estado."\n".$e->getMessage();
}

try{
    $stmt->bindParam(':Fpatente', $patente);
    $stmt->bindParam(':Fmarca', $marca);
    $stmt->bindParam(':Fmodelo', $modelo);
    $stmt->bindParam(':Fanio', $anio);
    $stmt->bindParam(':FfechaPat', $fechaPat);
    $stmt->bindParam(':Fpartido', $partido);
    $respuesta_estado=$respuesta_estado."\n Vinculacion exitosa.";
}
catch(PDOException $e ){
    $respuesta_estado=$respuesta_estado."\n".$e->getMessage();
}

    
try{
    $stmt->execute();
    $respuesta_estado=$respuesta_estado. "Datos insertados correctamente";
}   
catch(PDOException $e){ 
    
    $respuesta_estado=$respuesta_estado. "Error en la ejecución de la consulta: " . $e->getMessage();
} 

if (!empty($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'])) {
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    $sql = "UPDATE vehiculos2 SET imagenVehiculo = :imagen WHERE patente = :patente";

    try {
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':patente', $patente);
        $stmt->execute();
        $respuesta_estado .= "\nImagen subida correctamente.";
    } catch (PDOException $e) {
        $respuesta_estado .= "\nError al subir la imagen: " . $e->getMessage();
    }
} else {
    $respuesta_estado .= "\nNo se subió ninguna imagen.";
}


$dbh = null;


echo $respuesta_estado;
?>

