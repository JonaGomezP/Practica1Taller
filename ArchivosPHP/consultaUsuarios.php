<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require('conexion.php');


    $sqladministradores = "SELECT administrador from datos_usuario where nombre = '$usu' AND pass = '$pass'";
    $resultadoAdministrador = mysqli_query($conn, $sqladministradores);

    if ($resultadoAdministrador === false) {
        echo mysqli_error($conn);
        } else {
        $admin = mysqli_fetch_all($resultadoAdministrador, MYSQLI_ASSOC);
    }
    $res_admin = $admin[0]['administrador'];


    if($res_admin == "0"){
        $sqlusuarios =  "SELECT nombre,apellido1,apellido2,fecha_alta
        FROM datos_usuario
        where nombre = '$usu' AND pass = '$pass'";
        
        $resultadosUsuarios = mysqli_query($conn, $sqlusuarios);
        
        if ($resultadosUsuarios === false) {
        echo mysqli_error($conn);
        } else {
        $users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
        }
    } else{
        $sqlusuarios =  "SELECT nombre,apellido1,apellido2,fecha_alta
        FROM datos_usuario where nombre != '$usu' and pass != '$pass'";
        
        $resultadosUsuarios = mysqli_query($conn, $sqlusuarios);
        
        if ($resultadosUsuarios === false) {
        echo mysqli_error($conn);
        } else {
        $users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
        }
    }
}
?>
