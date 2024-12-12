<?php


function autenticacion($nombreUsuario, $contra) {
    // Conectar a la base de datos con PDO
    include("conexionBase.php");

    try {
        $stmt = $dbh->prepare('SELECT * FROM usuarios WHERE nombreUsuario = :nombreUsuario AND contra = :contra');
        $stmt->execute([
            ':nombreUsuario' => $username,
            ':contra' => hash('sha256', $contra)
        ]);

        if ($stmt->rowCount() === 1) {
            return true;
        } else {
            return false;
        }
    } 
    catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = $_POST['nombreUsuario'];
    $contra = $_POST['contra'];

    if (!autenticacion($nombreUsuario, $contra)) {
        header('Location: formLogin.html'); 
        exit();
    }

    $_SESSION['ejer08idsesion'] = session_create_id();
    $_SESSION['nombreUsuario'] = $nombreUsuario;

    echo "<p><button onClick=\"location.href='./app_modulo1.php'\">Ingrese a la aplicación</button></p>";
    echo "<p><button onClick=\"location.href='./destruirsesion.php'\">Terminar sesión</button></p>";
} else {
    header('Location: formLogin.html');
    exit();
}
?>