<?php
require "../Comun/header.php";
$db_host = "localhost";
$db_name = "taller";
$db_user = "admin";
$db_pass = "Admin123";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
} else {
    echo "Connection successfully.";
    $sql =  "SELECT nombre,apellido1,apellido2,fecha_alta, numero_vehiculos
            FROM datos_usuario";


    $resultados = mysqli_query($conn, $sql);

    if ($resultados === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($resultados, MYSQLI_ASSOC);
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
</head>

<body>

    <pre>
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