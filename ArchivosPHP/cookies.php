<?php

//Guardamos los datos del login que lo alamcena en una cookie
    $nombre_cookie = 'login.php';
    if (file_exists($nombre_cookie)) {
        echo("Fecha: ".date("d / F / Y")."</br>Hora: ".date("H:i",fileatime($nombre_cookie)));

    }
    setcookie("ultimoAcceso","$nombre_cookie");
?>
