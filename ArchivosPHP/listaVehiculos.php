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
    //Usuario mete username
    $unsername = "Rober";
    
    
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