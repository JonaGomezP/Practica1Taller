<?php

//Comprobar si viene con método post y que borre el usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'conexion.php';
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $idUsu = (int)$_POST['id_usuario'];
    settype($idUsu, 'int');

    
    //Eliminar usuario 

    $borrarUsuario = "DELETE from datos_usuario where id_usuario=$idUsu";

    $sql = mysqli_query($conn, $borrarUsuario);    
}
?>