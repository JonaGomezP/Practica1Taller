<?php
    //Datos de conexión a BBDD
    $db_host = "127.0.0.1:3306";
    $db_name = "mysql";
    $db_user = "prueba";
    $db_pass = "1234";


    //Establecer conexión con BBDD
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
?>