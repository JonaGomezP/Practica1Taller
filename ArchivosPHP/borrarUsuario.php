<?php


//Comprobar si viene con método post y que haga INSERT (botón guardar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $idUsu = (int)$_POST['id_usuario'];
    settype($idUsu, 'int');

    function eliminar($tmp){
        include 'conexion.php';

        //Eliminar vehículo 
        $borrarUsuario = "DELETE from datos_usuario where id_usuario=$tmp";
        $sql = mysqli_query($conn, $borrarUsuario); 
    }

    eliminar($idUsu);
    

    
       
}
