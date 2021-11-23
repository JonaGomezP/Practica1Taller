<?php

//Comprobar si viene con método post y que borre el vehículo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('Conexion.php');
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $idVeh = (int)$_POST['id_vehiculo'];
    settype($idVeh, 'int');

    //Eliminar vehículo 

    $borrado_Vehiculo = "DELETE FROM lista_vehiculos WHERE id_vehiculo = $idVeh ";
    $sql = mysqli_query($conn, $borrado_Vehiculo);    

}
?>