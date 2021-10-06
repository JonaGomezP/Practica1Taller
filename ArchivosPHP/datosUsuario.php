<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del usuario</title>
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


    $sql =  "SELECT nombre,apellido1,apellido2,fecha_alta,numero_vehiculos
            FROM datos_usuario
            where id_usuario = 'u01'";


    $results = mysqli_query($conn, $sql);

    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

        print_r($users);
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Fecha alta</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                    $nombre = "SELECT nombre 
                    FROM datos_usuario 
                    where id_usuario = 'u01'";
                    
                    $resultados = mysqli_query($conn, $nombre);

                    if ($resultados === false) {
                        echo mysqli_error($conn);
                    } else {
                        $usuario = mysqli_fetch_all($resultados, MYSQLI_ASSOC);

                        print_r($usuario);
                    }
                    ?>
                </td>
            </tr>
        </tbody>

















    </table>

</body>
</html>