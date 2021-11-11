<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('conexion.php');
    $ssql = "SELECT * FROM datos_usuario WHERE nombre='$usu' and pass='$pass'";

    $rs = mysqli_query($conn, $ssql);


    if (mysqli_num_rows($rs) != 0) {
        $nombre = $usu;
        $_SESSION["nombre"] = $nombre;
        $sqladministradores = "SELECT administrador from datos_usuario where nombre = '$usu' AND pass = '$pass'";
        $resultadoAdministrador = mysqli_query($conn, $sqladministradores);

        if ($resultadoAdministrador === false) {
            echo mysqli_error($conn);
        } else {
            $admin = mysqli_fetch_all($resultadoAdministrador, MYSQLI_ASSOC);
        }
        $res_admin = $admin[0]['administrador'];



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
            $sqlusuarios =  "SELECT nombre,apellido1,apellido2,fecha_alta,id_usuario
        FROM datos_usuario where nombre != '$usu' and pass != '$pass'";

            $resultadosUsuarios = mysqli_query($conn, $sqlusuarios);

            if ($resultadosUsuarios === false) {
                echo mysqli_error($conn);
            } else {
                $users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
            }
        }
    } else {
        
        header("Location: login.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="GET">
        <input type="hidden" name="valido" value="<?php echo($sqlusuarios) ?>">
    </form>
</body>
</html>