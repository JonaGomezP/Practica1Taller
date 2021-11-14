<?php
    $usu = $_POST['username'];
    $pass = $_POST['pass'];

    include 'conexion.php';
    include('consultaUsuarios.php');
    include('consultaVehiculos.php');
    include 'consultaVehiculos.php';

    $sql="UPDATE datos_usuario set pass='$pass' where nombre='$usu'";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del usuario</title>
    <link rel="stylesheet" href="../CSS/archivo.css">
    
</head>

<body style="position:relative;margin:0;-zindex:0">
<header>
    <?php require('../HTML/header.html'); ?>
</header>


    <!--Tabla que muestra la lista de usuarios -->

    <div class="divFormulario">
        <table border="2px">
            <caption style="caption-side: top;">Datos del usuario</caption>
            <thead>
                <tr>
                    <th class="tdcolor">Nombre</th>
                    <th class="tdcolor">Primer Apellido</th>
                    <th class="tdcolor">Segundo Apellido</th>
                    <th class="tdcolor">Fecha alta</th>
                    <th class="tdcolor">Numero vehiculos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $registro) :?>
                    <tr>
                        <td class="tdcolor"><?php echo $registro['nombre'] ?></td>
                        <td class="tdcolor"><?php echo $registro['apellido1'] ?></td>
                        <td class="tdcolor"><?php echo $registro['apellido2'] ?></td>
                        <td class="tdcolor"><?php echo $registro['fecha_alta'] ?></td>
                        <td class="tdcolor"><?php echo $cuenta['numero_vehiculos'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div>
        <form action="datosUsuario.php" method="POST">
                <input type="hidden" name="username" value="<?php echo $usu ?>">
                <input type="hidden" name="pass" value="<?php echo $pass ?>">
                Editar constraseña: 
                <label for="pass"></label>
                <input type="text" name="pass" placeholder="Nueva contraseña" required>
                <input type="submit" value="Guardar">
        </form>