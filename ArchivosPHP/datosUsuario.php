<?php
include('conexion.php');

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Comenzamos la sesion
        $usu = $_POST['username'];
        $pass = $_POST['pass'];
        
        require('sesion.php');
        
        
        

        //--------------------------------------------------------------------------
        //Consulta de usuarios (llama archivo consultaUsuarios.php)

        //--------------------------------------------------------------------------
        //Consulta de vehiculos (llama archivo consultaVehiculos.php)

    } else {
        echo '<p>Por favor, complete el <a href="login.html">formulario</a></p>';
    }

    //Comprobar si viene con método post y que haga INSERT (botón guardar)- -------------------------------------------------------------

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del usuario</title>
    <link rel="stylesheet" href="../CSS/common.css">
    <script src="../JS/funciones.js"></script>

</head>

<body style="position:relative;margin:0;-zindex:0">
    <header>
        <?php require('../Comun/header.php'); ?>
    </header>


<?php if ($_SESSION == true) : ?>


<!--Consulta de usuarios (llama archivo consultaUsuarios.php), comprobar si es administrador y si el login es correcto (devuelve valores) iniciamos una sesión. -->
<?php require('consultaUsuarios.php') ?>

<!--Consulta de vehiculos (llama archivo consultaVehiculos.php) -->
<?php require('consultaVehiculos.php'); ?>



<!--Tabla que muestra la lista de usuarios -->

<div class="divFormulario">
    <table>
        <caption style="caption-side: top;">Datos del usuario</caption>
        <thead>
            <tr>
                <th class="tdcolor">Nombre</th>
                <th class="tdcolor">Primer Apellido</th>
                <th class="tdcolor">Segundo Apellido</th>
                <th class="tdcolor">Fecha alta</th>
                <?php if ($res_admin == 0) : ?>
                    <th class="tdcolor">Numero vehiculos</th>
                    <th class="tdcolor">Última conexión</th>
                <?php else : ?>
                    <th>id</th>
                <?php endif; ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $registro) : ?>
                <tr>
                    <td class="tdcolor"><?php echo $registro['nombre'] ?></td>
                    <td class="tdcolor"><?php echo $registro['apellido1'] ?></td>
                    <td class="tdcolor"><?php echo $registro['apellido2'] ?></td>
                    <td class="tdcolor"><?php echo $registro['fecha_alta'] ?></td>
                    <?php if ($res_admin == "0") : ?>
                        <td class="tdcolor"><?php echo $cuenta ?></td>
                        <td class="tdcolor"><?php require("cookies.php"); ?></td>
                    <?php endif; ?>
                    <?php if ($res_admin != "0") : ?>
                        <!--Formulario para consultar los vehiculos de cada usuario como administrador-->
                        <td>
                            <form action="datosUsuario.php" method="POST">
                                <input type="" name="username" value="<?php echo $registro['nombre'] ?>">
                                <input type="hidden" name="pass" value="<?php echo $registro['pass'] ?>">
                                <input type="hidden" name="id_usuario" value="<?php echo $registro['id_usuario'] ?>">
                                <input type="submit" value="Consultar vehículos de <?php echo $registro['nombre'] ?>">
                            </form>
                        </td>
                        <!--Formulario par eliminar un usuario como administrador -->
                        <td>
                            <form action="borrarUsuario.php" method="POST">
                                <input type="hidden" name="username" value="<?php echo $usu ?>">
                                <input type="hidden" name="pass" value="<?php echo $pass ?>">
                                <input type="hidden" name="id_usuario" value="<?php echo $registro['id_usuario'] ?>">
                                <input name="papelera" style="width: 3º5px; height:35px;" type="image" src="../IMG/papelera.png" alt="Eliminar usuario">
                            </form>
                        </td>
                    <?php endif; ?>
                <?php endforeach ?>
                </tr>
        </tbody>
    </table>
</div>


<!--Tabla que muestra la lista de vehículos y envía como formulario el campo id_vehiculo para la consulta de servicios -->
<?php if ($res_admin == "0") : ?>

<div class="divFormulario">
    <table>
        <caption>Lista de vehículos</caption>
        <thead>
            <tr>
                <th class="tdcolor">Marca</th>
                <th class="tdcolor">Modelo</th>
                <th class="tdcolor">Combustible</th>
                <th class="tdcolor">Tipo de Motor</th>
                <th class="tdcolor">Matricula</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coches as $registro) : ?>
                <tr>
                    <td class="tdcolor"><?php echo $registro['marca'] ?></td>
                    <td class="tdcolor"><?php echo $registro['modelo'] ?></td>
                    <td class="tdcolor"><?php echo $registro['combustible'] ?></td>
                    <td class="tdcolor"><?php echo $registro['tipo_motor'] ?></td>
                    <td class="tdcolor" style="height: 30px;">
                        <form action="listaServicios.php" method="POST">
                            <input id="matricula" name="matricula" style="height:35px;border:solid 0.5px;background-image:url('../IMG/matricula-vacia.png'); background-size: cover; background-position:center" value="<?php echo $registro['matricula'] ?>" readonly>
                            <input type="hidden" name="id_vehiculo" value="<?php echo $registro['id_vehiculo'] ?>">
                            <input type="submit" value="Consultar lista de servicios">
                        </form>
                    </td>
                    <td>
                        <form action="borrarVehiculo.php" method="GET">
                            <input type="" name="id_vehiculo" value="<?php echo $registro['id_vehiculo'] ?>">
                            <input style="width: 35px; height:35px;" type="image" src="../IMG/papelera.png" alt="Eliminar vehículo">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<br>
<!--Formulario que añade un nuevo vehículo -->

<?php if ($res_admin == 0) : ?>
    <h2 style="color: white;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;text-align:center;font-weight: normal;">Nuevo vehículo</h>
        <div class="divFormulario">
            <form action="insertarVehiculos.php" method="POST" target="_self">
                <input type="hidden" name="id_usuario" value="<?php echo $registro['id_usuario'] ?>">
                <input type="hidden" name="username" value="<?php echo $usu ?>">
                <input type="hidden" name="pass" value="<?php echo $pass ?>">
                <input type="text" name="marca" placeholder="Marca">
                <input type="text" name="modelo" placeholder="modelo">
                <input type="text" name="matricula" maxlength="7" placeholder="matricula">
                <input type="text" name="combustible" placeholder="combustible">
                <input type="text" name="tipo_motor" placeholder="tipo de motor">
                <input type="submit" value="guardar">
            </form>
        </div>
<?php endif; ?>
 

    <!--Formulario que añade un nuevo usuario -->

    <?php if ($res_admin == 1) : ?>
        <h2 style="color: white;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;text-align:center; font-weight: normal">Nuevo usuario</h2>
        <div class="divFormulario">
            <form action="datosUsuario.php" method="POST" target="_self">
                <input type="hidden" name="id_usuario" value="<?php echo $id_usu ?>">
                <input type="hidden" name="username" value="<?php echo $usu ?>">
                <input type="hidden" name="pass" value="<?php echo $pass ?>">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="text" name="apellido1" placeholder="Primer apellido">
                <input type="text" name="apellido2" placeholder="Segundo apellido">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="password" name="passwordRepetida" placeholder="Vuelve a escribir la contraseña">
                <input type="date" name="fecha_alta" placeholder="fecha actual" value="<?php echo date('Y-m-d') ?>" readonly>
                <input type="submit" name="insertarUsuario" value="Añadir usuario" onclick="verificarPass()">
                <?php if(isset($_POST['insertarUsuario'])) : ?>
                    <?php require('insertarUsuario.php') ?>
                <?php endif; ?>
            </form>
        </div>
    <?php endif; ?> 
<?php endif; ?>

<footer>
    <?php require('../Comun/footer.php') ?>
</footer>
</body>


</html>