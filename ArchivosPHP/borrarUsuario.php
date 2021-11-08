<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';
    //$id = "SELECT id_usuario FROM datos_usuario where nombre = $usu AND pass = $pass";
    //$id_usu = $_POST['id_usuario'];
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $res_admin=$_POST['admin'];
    $id_prueba=$_POST['id_prueba'];
    print_r($usu);


    
    //Insertar vehículo nuevo

    $borrarUsuario = "DELETE from datos_usuario where nombre='$usu' and pass='$pass'";

    $sql = mysqli_query($conn, $borrarUsuario);    
    include("datosUsuario.php");
}