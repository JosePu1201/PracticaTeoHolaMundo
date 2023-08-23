<?php
//Conexion con los datos del servidor
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "Modelo";

// inicia la conexion
$conexion = new mysqli($serverName, $userName, $password, $databaseName);
//en caso de que la conexion falle
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
    echo "fallo";
} 
//conexion exitosa
else {
    //entrada de paramnetros enviados desde java script
    if (isset($_GET['parametrocui']) && isset($_GET['parametroVoto'])) {
        // Realiza alguna operación con los parámetros si es necesario
        $parametro1 = $_GET['parametrocui'];
        $parametro2 = $_GET['parametroVoto'];
        //Consulta que el cui este o no en la base de datos
        $consulta = "SELECT COUNT(*) AS total FROM Persona WHERE cui = '$parametro1'";
        $resultado = $conexion->query($consulta);
        // funciona la peticion
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $totalCuis = $fila['total']; // guarda el total de ocurrencias 
            
            if ($totalCuis > 0) { // si ya aparece entonces ya no puede registrar una respuesta 
                echo "Ya registraste una respuesta, no puedes volver a intentarlo";
            } else {
                // aun no responde a la encuesta y se agrega su dpi para guardarlo en la base de datos
                $insertar = "INSERT INTO Persona (cui) VALUES ('$parametro1')";
                // La insercion es correcta 
                if($conexion->query($insertar) === TRUE){
                    // ahora se utiliza el valor por quien vota 
                    $valCantidad = "SELECT cantidad FROM PartidoPolitico WHERE nombre = '$parametro2'";
                    $resultado = $conexion->query($valCantidad);
                    if($resultado->num_rows > 0){
                        $fila = $resultado->fetch_assoc();
                        $cantActual = $fila["cantidad"];
                        $nuevaCant = $cantActual + 1;

                        $insertarCant = "UPDATE PartidoPolitico SET cantidad =  $nuevaCant WHERE nombre = '$parametro2'";
                        if($conexion->query($insertarCant) === TRUE){
                            echo " Tu intencion de voto se registro con exito";
                        }
                        else{
                            echo "Ocurrio un error al registrar tu intencion de voto> Intentalo de nuevo";
                        }
                    }
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
