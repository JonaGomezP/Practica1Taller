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

$sql = "SELECT nombre,apellido1,apellido2,fecha_alta,numero_vehiculos
    FROM datos_usuario
    where id_usuario = 'u01'";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>USUARIOS</title>
    <meta charset="utf-8">
</head>

<body>

    <header>
        <h1>USUARIOS</h1>
    </header>

    <main>
        <?php if (empty($users)) : ?>
            <p>No hay ningún usuario registrado</p>
        <?php else : ?>

            <ul>
                <?php foreach ($users as $user) : ?>
                    <li>
                        <user>
                            <h2><?= $user['nombre']; ?></h2>
                            <p><?= $user['login']; ?></p>
                            <p><?= $user['id_usuario']; ?></p>
                        </user>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
    </main>
</body>

</html>