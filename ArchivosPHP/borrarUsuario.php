<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $idUsu = (int)$_POST['id_usuario'];
    settype($idUsu, 'int');
    
    //Eliminar vehículo 

    $borrarUsuario = "DELETE from datos_usuario where id_usuario=$idUsu";

    $sql = mysqli_query($conn, $borrarUsuario);    
    require("datosUsuario.php");
}
?>