<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';
    //$id = "SELECT id_usuario FROM datos_usuario where nombre = $usu AND pass = $pass";
    //$id_usu = $_POST['id_usuario'];
    $matricula = $_POST['matricula'];
    $servicio = $_POST['servicio'];
    $ultima_revision = $_POST['ultima_revision'];
    $proxima_revision = $_POST['proxima_revision'];
    $detalles = $_POST['detalles'];

    echo ($matricula);



    //Capturar el ID del vehículo
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


    //Insertar servicio nuevo

    $insertar_servicio = "INSERT INTO lista_servicios (id_vehiculo,servicio,servicio,ultima_revision,proxima_revision,comentarios) VALUES ('$id_veh','$servicio','$ultima_revision','$proxima_revision','$detalles')";

    $sql = mysqli_query($conn, $insertar_servicio);
    include("datosUsuario.php");
}
