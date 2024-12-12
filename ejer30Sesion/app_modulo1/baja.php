<?php
include("conexionBase.php");

$patente=isset($_GET['Fpatente']) ? htmlspecialchars($_GET['Fpatente']) : '';
$respuesta_estado=$patente;
$sql="DELETE  from vehiculos2 where patente=:Fpatente";
$respuesta_error ="";
try {
    $stmt = $dbh->prepare($sql);
    $respuesta_estado=$respuesta_estado."\n Preparacion exitosa.";
}
catch(PDOException $e){
    $respuesta_estado=$respuesta_estado."\n".$e->getMessage();
    $respuesta_error = date('Y-m-d H:i:s') ."Error " . $e->getMessage()."\n";

}

try{
    $stmt->bindParam(':Fpatente', $patente);
    $respuesta_estado=$respuesta_estado."\n Vinculacion exitosa.";
}
catch(PDOException $e ){
    $respuesta_estado=$respuesta_estado."\n".$e->getMessage();
    $respuesta_error = date('Y-m-d H:i:s') ."Error " . $e->getMessage()."\n";
}
    
try{
    $stmt->execute();
    $respuesta_estado=$respuesta_estado. "Datos eliminados correctamente";
}   
catch(PDOException $e){ 
    
    $respuesta_estado=$respuesta_estado. "Error en la ejecución de la consulta: " . $e->getMessage();
    $respuesta_error = date('Y-m-d H:i:s') ."Error " . $e->getMessage()."\n";
} 

$dbh = null;

echo $respuesta_estado;

?>