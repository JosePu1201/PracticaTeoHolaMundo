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
    $cantUne = pedir("UNE",$conexion);
    $cantSemilla = pedir("SEMILLA",$conexion);
    $cantNulo = pedir("NULO",$conexion);
    $total = $cantUne + $cantSemilla + $cantNulo + 0 ;

    echo "La encuesta se encuentra de esta forma:\nUNE: ".$cantUne."\nSEMILLA: ".$cantSemilla."\nNULO: ".$cantNulo."\nTotal de votos: ".$total;
    $conexion->close();
}
function pedir($buscando,$conexion){
    $can = 0;
    $cantidad = "SELECT cantidad FROM PartidoPolitico WHERE nombre = '$buscando'";
    $resultado = $conexion->query($cantidad);
    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();
        $can = $fila["cantidad"];
    }
    return $can;
}
?>