<?php
include("conexionBase.php");

$patente=isset($_GET['Fpatente']) ? htmlspecialchars($_GET['Fpatente']) : '';
$respuesta_estado=$patente;
$sql="DELETE  from vehiculos2 where patente=:Fpatente";

try {
    $stmt = $dbh->prepare($sql);
    $respuesta_estado=$respuesta_estado."\n Preparacion exitosa.";
}
catch(PDOException $e){
    $respuesta_estado=$respuesta_estado."\n".$e->getMessage();
}

try{
    $stmt->bindParam(':Fpatente', $patente);
    $respuesta_estado=$respuesta_estado."\n Vinculacion exitosa.";
}
catch(PDOException $e ){
    $respuesta_estado=$respuesta_estado."\n".$e->getMessage();
}
    
try{
    $stmt->execute();
    $respuesta_estado=$respuesta_estado. "Datos eliminados correctamente";
}   
catch(PDOException $e){ 
    
    $respuesta_estado=$respuesta_estado. "Error en la ejecución de la consulta: " . $e->getMessage();
} 

$dbh = null;

echo $respuesta_estado;

?>