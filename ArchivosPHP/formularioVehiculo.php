<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
        }
    </style>
</head>

<body>
    <?php
    include('datosUsuario.php');
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    $id = $conn->query("SELECT id_usuario FROM datos_usuario where nombre = $usu");
    ?>
    <pre>
        <div style="background: white;">
            <form action="datosUsuario.php" method="POST" target="self">
                
                <input type="text" name="marca" placeholder="Marca">
                <input type="text" name="modelo" placeholder="modelo">
                <input type="text" name="matricula" maxlength="7" placeholder="matricula">
                <input type="text" name="combustible" placeholder="combustible">
                <input type="text" name="tipo_motor" placeholder="tipo de motor">
                <input type="submit" value="guardar">
            </form>
        </div>
    
    </pre>

</body>

</html>