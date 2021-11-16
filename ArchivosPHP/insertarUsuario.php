
<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';
    //$id = "SELECT id_usuario FROM datos_usuario where nombre = $usu AND pass = $pass";
    //$id_usu = $_POST['id_usuario'];
    $usu = $_POST['username'];
    //$pass=$_POST['pass'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    

    //Insertar vehículo nuevo

    $insertarUsuario = "INSERT INTO datos_usuario (nombre,apellido1,apellido2,pass,fecha_alta) VALUES ('$nombre','$apellido1','$apellido2','$password',NOW())";

    $sql = mysqli_query($conn, $insertarUsuario);
}
