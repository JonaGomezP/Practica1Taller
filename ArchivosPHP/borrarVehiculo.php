<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
    require('Conexion.php');
    $idVeh = (int)$_GET['id_vehiculo'];
    var_dump($idVeh);

    $borrado_Vehiculo = "DELETE FROM lista_vehiculos WHERE id_vehiculo = $idVeh ";
?>