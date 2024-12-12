<?php
session_start();
if (!isset($_SESSION['identificativo'])) {

    function autenticacion($nombreUsuario, $contra) {
        $dbname = "autos";
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $respuesta_error = "";
        try {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password); /* Database Handle */
        } catch (PDOException $e) {
            $respuesta_error = $respuesta_error . date('Y-m-d H:i:s') . " Error " . $e->getMessage() . "\n";
            error_log($respuesta_error, 3, "./error.log");
            return false;
        }

        $sql = "SELECT contra, contador FROM usuarios WHERE nombreUsuario = :nombreUsuario";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario);

        try {
            $stmt->execute();
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($fila) {
                $hashedPassword = $fila['contra'];
                if ($contra == $hashedPassword) {                    
                    $contador = isset($fila['contador']) ? $fila['contador'] + 1 : 1;                 
                    $sqlUpdate = "UPDATE usuarios SET contador = :contador WHERE nombreUsuario = :nombreUsuario";
                    $stmtUpdate = $dbh->prepare($sqlUpdate);
                    $stmtUpdate->bindParam(':contador', $contador);
                    $stmtUpdate->bindParam(':nombreUsuario', $nombreUsuario);
                    $stmtUpdate->execute();                 
                    $_SESSION['contador'] = $contador;
                    $_SESSION['nombreUsuario'] = $nombreUsuario;
                    $_SESSION['contra'] = $contra;
                    

                    return true;
                }
            }
        } catch (PDOException $e) {
            $respuesta_error = $respuesta_error . date('Y-m-d H:i:s') . " Error en la ejecución de la consulta: " . $e->getMessage() . "\n";
            error_log($respuesta_error, 3, "./error.log");
            return false;
        }
        return false;
    }

    if(!empty($_POST['btEnviar'])){
        

        if(!empty($_POST['nombreUsuario']) && !empty($_POST['contra'])){
            
        
        $nombreUsuario = $_POST['nombreUsuario'];
        $contra = $_POST['contra'];
        $_SESSION['contraOriginal'] = $contra;
        $contra = hash("sha256", $contra);

        if (!autenticacion($nombreUsuario, $contra)) {
            $respuesta_error = date('Y-m-d H:i:s') . " error autenticacion \n";
            
            error_log($respuesta_error, 3, "./error.log");
            echo "CONTRASEÑA O USUARIO EQUIVOCADO";
        
        }
        else{
            
            $_SESSION['identificativo'] = session_create_id();
            header ("location:inicio.php");

        }

        }
        else{
            echo "CAMPOS INCOMPLETOS";
        }
    }  
    else{
        echo "";
    }  
    

} else {
    
    $_SESSION['identificativo'] = session_create_id();       
    header ("location:inicio.php");
}
?>
