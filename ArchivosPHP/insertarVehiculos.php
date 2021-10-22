<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'Conexion.php';
    //$id = "SELECT id_usuario FROM datos_usuario where nombre = $usu AND pass = $pass";
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $matricula = $_POST['matricula'];
    $combustible = $_POST['combustible'];
    $tipo_motor = $_POST['tipo_motor'];
    $insertar = "INSERT INTO lista_vehiculos_prueba (id_usuario,marca,modelo,matricula,combustible,tipo_motor) VALUES ('$marca','$modelo','$matricula','$combustible','$tipo_motor')";

    $sql = mysqli_query($conn, $insertar);    
    include("datosUsuario.php");
        
}
