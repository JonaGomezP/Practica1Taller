<?php
    //Datos de conexión a BBDD
    $db_host = "localhost";
    $db_name = "tallerServidores";
    $db_user = "admin";
    $db_pass = "Admin123";


    //Establecer conexión con BBDD
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
?>