<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de vehículos</title>
    <style>
        body {
            background: black;
            color: white;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <pre>
    <?php
    $db_host = "localhost";
    $db_name = "taller";
    $db_user = "admin";
    $db_pass = "Admin123";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    echo "Connected successfully.";

    $sql = "SELECT *
            FROM lista_servicios";

    $results = mysqli_query($conn, $sql);

    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

        print_r($users);
    }
    ?>

<table border="2px" style="border-spacing:15px; border-collapse:separate">
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
</pre>
</body>

</html>