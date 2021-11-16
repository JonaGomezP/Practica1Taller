<?php

//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $idUsu = (int)$_POST['id_usuario'];
    settype($idUsu, 'int');
<<<<<<< HEAD
=======

>>>>>>> 487d3d14e91dfca77780b5310ebfa5fe5a7cda28
    
    //Eliminar vehículo 

    $borrarUsuario = "DELETE from datos_usuario where id_usuario=$idUsu";

    $sql = mysqli_query($conn, $borrarUsuario);    
<<<<<<< HEAD
    require("datosUsuario.php");
=======
>>>>>>> 487d3d14e91dfca77780b5310ebfa5fe5a7cda28
}
?>