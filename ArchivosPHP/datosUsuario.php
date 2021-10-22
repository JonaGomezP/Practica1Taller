<?php

include('Conexion.php');

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usu = $_POST['username'];
        $pass = $_POST['pass'];

        //Recuperar ID del usuario
        $id =  "SELECT id_usuario
        FROM datos_usuario 
        where nombre = '$usu' AND pass = '$pass'";


        $resultadoID = mysqli_query($conn, $id);

        if ($resultadoID === false) {
            echo mysqli_error($conn);
        } else {
            $resID = mysqli_fetch_all($resultadoID, MYSQLI_ASSOC);
        }

        $idVehiculo = $resID[0];
        //--------------------------------------------------------------------------
        //Consulta de usuarios (llama archivo consultaUsuarios.php)

        include('consultaUsuarios.php');

        //--------------------------------------------------------------------------
        //Consulta de vehiculos (llama archivo consultaVehiculos.php)

        include('consultaVehiculos.php');
    } else {
        echo '<p>Por favor, complete el <a href="login.html">formulario</a></p>';
    }


    //Comprobar si viene con método post y que haga INSERT (botón guardar)- -------------------------------------------------------------



    //Consulta a la tabla lista de vehículos

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
        <form action="insertarVehiculos.php" method="POST" target="self">
            <input type="hidden" name="username" value="<?php echo $usu?>">
            <input type="hidden" name="pass" value="<?php echo $pass?>">
            <input type="text" name="marca" placeholder="Marca">
            <input type="text" name="modelo" placeholder="modelo">
            <input type="text" name="matricula" maxlength="7" placeholder="matricula">
            <input type="text" name="combustible" placeholder="combustible">
            <input type="text" name="tipo_motor" placeholder="tipo de motor">
            <input type="submit" value="guardar">
            <!-- onclick="insertarVehiculo() -->
        </form>
    </div>


</body>

</html>