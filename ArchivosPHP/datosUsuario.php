<?php

//Datos de conexión a BBDD
$db_host = "localhost";
$db_name = "tallerServidores";
$db_user = "admin";
$db_pass = "Admin123";


//Establecer conexión con BBDD
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
} else {
    echo "Conexión existosa.";
    //Consulta a la tabla de usuarios
        $usu = $_POST['username'];
        $pass = $_POST['pass'];
        $id = "SELECT id_usuario FROM datos_usuario where nombre = $usu AND pass = $pass";

        $sqlusuarios =  "SELECT nombre,apellido1,apellido2,fecha_alta,numero_vehiculos
        FROM datos_usuario
        where nombre = '$usu' AND pass = '$pass'";


        $resultadosUsuarios = mysqli_query($conn, $sqlusuarios);

        if ($resultadosUsuarios === false) {
            echo mysqli_error($conn);
        } else {
            $users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
        }
    
    $username = $usu;
    $pwd = $pass;


    //Comprobar si vengo de GET ()




    //Comprobar si viene con método post y que haga INSERT (botón guardar)
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $matricula = $_POST['matricula'];
            $combustible = $_POST['combustible'];
            $tipo_motor = $_POST['tipo_motor'];

            $sql = "INSERT INTO lista_vehiculos (id_usuario,marca,modelo,matricula,combustible,tipo_motor) VALUES ('$id','$marca','$modelo','$matricula','$combustible','$tipo_motor')";

            $resV = mysqli_query($conn, $sql);

            if ($resV === false) {
                echo mysqli_error($conn);
            } else {
                $users = mysqli_fetch_all($resV, MYSQLI_ASSOC);
            }
        }
    




    //Consulta a la tabla lista de vehículos
    $sqlVehiculos =  "SELECT marca,modelo,matricula,combustible, tipo_motor
            FROM lista_vehiculos 
            where (SELECT id_usuario from datos_usuario where nombre = '$username' AND pass = '$pwd')=id_usuario";


    $resultadosVehiculos = mysqli_query($conn, $sqlVehiculos);

    if ($resultadosVehiculos === false) {
        echo mysqli_error($conn);
    } else {
        $coches = mysqli_fetch_all($resultadosVehiculos, MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del usuario</title>
    <style>
        * {
            margin: 0;
        }

        body {
            background: white;
        }

        button {
            cursor: pointer;
        }

        caption {
            caption-side: top;
        }

        .divFormulario {}
    </style>
</head>

<body style="position:relative;margin:0;-zindex:0">




    <div class="divFormulario">
        <table border="2px" style="border-spacing:5px; border-collapse:separate;color:black;">
            <caption style="caption-side: top;">Datos del usuario</caption>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Fecha alta</th>
                    <th>Numero vehiculos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $registro) : ?>
                    <tr>
                        <td><?php echo $registro['nombre'] ?></td>
                        <td><?php echo $registro['apellido1'] ?></td>
                        <td><?php echo $registro['apellido2'] ?></td>
                        <td><?php echo $registro['fecha_alta'] ?></td>
                        <td><?php echo $registro['numero_vehiculos'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="divFormulario">
        <table border="2px" style="border-spacing:15px; border-collapse:separate;color:black;">
            <caption>Lista de vehículos</caption>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matricula</th>
                    <th>Combustible</th>
                    <th>Tipo de Motor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coches as $registro) : ?>
                    <tr>
                        <td><?php echo $registro['marca'] ?></td>
                        <td><?php echo $registro['modelo'] ?></td>
                        <td><?php echo $registro['matricula'] ?></td>
                        <td><?php echo $registro['combustible'] ?></td>
                        <td><?php echo $registro['tipo_motor'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <br>
    <div style="background: white;">
        <form action="datosUsuario.php" method="POST" target="self">
            <input type="hidden" name="username" placeholder="Marca" value="$usu">
            <input type="hidden" name="pass" placeholder="Marca" value="$pass" >
            <input type="text" name="marca" placeholder="Marca">
            <input type="text" name="modelo" placeholder="modelo">
            <input type="text" name="matricula" maxlength="7" placeholder="matricula">
            <input type="text" name="combustible" placeholder="combustible">
            <input type="text" name="tipo_motor" placeholder="tipo de motor">
            <input type="submit" value="guardar">
        </form>
    </div>


</body>

</html>