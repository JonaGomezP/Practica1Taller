<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';
    $id_vehiculo = $_POST['id_vehiculo'];
    $matricula = $_POST['matricula'];
    $servicio = $_POST['servicio'];
    $ultima_revision = $_POST['ultima_revision'];
    $proxima_revision = $_POST['proxima_revision'];
    $detalles = $_POST['detalles'];

    echo ($id_vehiculo);
    echo ($matricula);
    echo ($servicio);
    echo ($ultima_revision);
    echo ($proxima_revision);
    echo ($detalles);



    //Capturar el ID del vehículo
    /*
    $id_v =  "SELECT id_vehiculo
    FROM lista_servicios 
    where matricula = '$matricula'";


    $resultadoVeh = mysqli_query($conn, $id_v);

    if ($resultadoVeh === false) {
        echo mysqli_error($conn);
    } else {
        $resV = mysqli_fetch_all($resultadoVeh, MYSQLI_ASSOC);
    }

    $id_veh = $resV[0]['id_vehiculo'];
    echo($id_veh);
*/

    //Insertar servicio nuevo

    $insertar_servicio = "INSERT INTO lista_servicios (id_vehiculo,matricula,servicio,ultima_revision,proxima_revision,comentarios) VALUES ('$id_vehiculo','$matricula','$servicio','$ultima_revision','$proxima_revision','$detalles')";

    $sql = mysqli_query($conn, $insertar_servicio);
    require('listaServicios.php');
}
