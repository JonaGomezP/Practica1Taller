<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Parrapu</title>
</head>

<body>
    <div>
        <form action="datosUsuario.php" method="POST" style="background: rgba(0, 0, 0, 0.7);color:white">
            <label for="username">Usuario</label>
            <input type="text" name="username" required>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" required>
            <input type="submit" value="ENTRAR" name="enviar">
        </form>
    </div>

    <?php
    require "../HTML/header.php"
    ?>
    <?php
    require "../HTML/fondoLogin.php"
    ?>
    <?php
    require "../HTML/footer.php"
    ?>
</body>

</html>