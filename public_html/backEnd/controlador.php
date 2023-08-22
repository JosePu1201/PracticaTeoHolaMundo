<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "ModeloHolaMundo";

$conexion = new mysqli($serverName, $userName, $password, $databaseName);
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
    echo "fallo";
} else {
    if (isset($_GET['parametrocui']) && isset($_GET['parametroVoto'])) {
        // Realiza alguna operación con los parámetros si es necesario
        $parametro1 = $_GET['parametrocui'];
        $parametro2 = $_GET['parametroVoto'];

        $consulta = "SELECT COUNT(*) AS total FROM Persona WHERE cui = '$parametro1'";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $totalCuis = $fila['total'];

            if ($totalCuis > 0) {
                echo "Ya registraste una respuesta, no puedes volver a intentarlo";
            } else {
                $insertar = "INSERT INTO Persona (cui) VALUES ('$parametro1')";
                if($conexion->query($insertar) === TRUE){
                    
                }
                else{
                    echo "Error al registrar tu respuesta";
                }
            }
        } else {
            echo "Error en la consulta";
        }
    }
}


?>
