<pre>
<?php

    $usu = $_GET['id_usuario'];
    $veh = $_GET['id_vehiculo'];
    $db_host = "10.192.240.8:81";
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
            FROM lista_servicios
            ORDER BY date_entry;";
 
    $results = mysqli_query($conn, $sql);
 
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
 
        print_r($users);
    }
 
?>
</pre>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de vehículos</title>
</head>

<body>

</body>

</html>