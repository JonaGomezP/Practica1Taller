<?php
$db_host = "localhost";
$db_name = "taller";
$db_user = "admin";
$db_pass = "Admin123";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
} else {
    echo "Conexión existosa.";
    //Consulta a la tabla de usuarios
    $sqlUsuario =  "SELECT nombre,apellido1,apellido2,fecha_alta, numero_vehiculos
            FROM datos_usuario
            where id_usuario = 1";

    $resultadosUsuarios = mysqli_query($conn, $sqlUsuario);

    if ($resultadosUsuarios === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
    }

    //Consulta a la tabla lista de vehículos
    $sqlVehiculos =  "SELECT marca,modelo,matricula,combustible, tipo_motor
            FROM lista_vehiculos as v
            join datos_usuario as u
            where v.id_usuario = u.id_usuario";

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
        button {
            cursor: pointer;
        }

        caption {
            caption-side: top;
        }
    </style>
</head>

<body>

    <pre>
    <table border="2px" style="border-spacing:15px; border-collapse:separate">
    <caption>Datos del usuario</caption>
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
    <table border="2px" style="border-spacing:15px; border-collapse:separate">
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
    <a href="../ArchivosPHP/formularioVehiculo.php" target="blanc"><button>Añadir vehículo</button></a>
    </pre>
</body>

</html>