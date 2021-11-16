<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('conexion.php');
    
        $sqladministradores = "SELECT administrador from datos_usuario where nombre = '$usu' AND pass = '$pass'";
        $resultadoAdministrador = mysqli_query($conn, $sqladministradores);

        if ($resultadoAdministrador === false) {
            echo mysqli_error($conn);
        } else {
            $admin = mysqli_fetch_all($resultadoAdministrador, MYSQLI_ASSOC);
        }

        //Recuperar si es administrador o no (0 no, distinto de 0 sí)
        if(isset($admin['0']['administrador'])){
            $res_admin = $admin[0]['administrador'];
        }

        if ($res_admin == "0") {
            $sqlusuarios =  "SELECT nombre,apellido1,apellido2,fecha_alta,id_usuario
            FROM datos_usuario
            where nombre = '$usu' AND pass = '$pass'";

            $resultadosUsuarios = mysqli_query($conn, $sqlusuarios);

            if ($resultadosUsuarios == false) {
                echo mysqli_error($conn);
            } else {
                $users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
            }
        } else {
            $sqlusuarios =  "SELECT nombre,apellido1,apellido2,fecha_alta,id_usuario,pass
        FROM datos_usuario where nombre != '$usu' and pass != '$pass'";

            $resultadosUsuarios = mysqli_query($conn, $sqlusuarios);

            if ($resultadosUsuarios === false) {
                echo mysqli_error($conn);
            } else {
                $users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 487d3d14e91dfca77780b5310ebfa5fe5a7cda28
}
?>


