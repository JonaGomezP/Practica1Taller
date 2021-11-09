<?php
include('conexion.php');

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usu = $_POST['username'];
        $pass = $_POST['pass'];

        //numero de visitas
        if(isset($_COOKIE['contador']))
        { 
            setcookie('contador', $_COOKIE['contador'] + 1); 
            $mensaje = 'Número de visitas global: ' . $_COOKIE['contador']; 
        } 
        else 
        { 
            setcookie('contador', 1); 
            $mensaje = 'Bienvenido a nuestra página web'; 
        } 

        
        

        //--------------------------------------------------------------------------
        //Consulta de usuarios (llama archivo consultaUsuarios.php)

        include('consultaUsuarios.php');

        //--------------------------------------------------------------------------
        //Consulta de vehiculos (llama archivo consultaVehiculos.php)

        include('consultaVehiculos.php');
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

</head>

<body style="position:relative;margin:0;-zindex:0">
<p style="color: white;"><?php echo $mensaje ?><p>
    <header>
        <?php require('../HTML/header.html'); ?>
        
    </header>


    <!--Tabla que muestra la lista de usuarios -->

    <div class="divFormulario">
        <table>
            <caption style="caption-side: top;">Datos de los Usuarios Registrados</caption>
            <thead>
                <tr>
                    <th class="tdcolor">Nombre</th>
                    <th class="tdcolor">Primer Apellido</th>
                    <th class="tdcolor">Segundo Apellido</th>
                    <th class="tdcolor">Fecha alta</th>
                    <?php if ($res_admin == 0) : ?>
                        <th class="tdcolor">Numero vehiculos</th>
                        <th class="tdcolor">Última conexión</th>
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
                            <td class="tdcolor"><?php require("cookies.php"); setcookie("ultimoAcceso", "$nombre_cookie"); ?></td>
                        <?php endif; ?>
                        
                            <?php if($res_admin==1): ?>
                                <td class="tdcolor">
                                    <form action="borrarUsuario.php" method="POST">
                                        <input type="hidden" name="username" value="<?php echo $registro['nombre'] ?>">
                                        <input type="hidden" name="pass" value="<?php echo $pass ?>">
                                        <input type="hidden" name="admin" value="<?php echo $res_admin ?>">
                                        <input type="hidden" name="id_prueba" value="<?php echo $id_prueba ?>">
                                        <input type="submit" value="Borrar">
                                    </form>
                                </td>
                            <?php endif; ?>
                        
                        <?php endforeach ?>
                    </tr>
            </tbody>
        </table>
    </div>
    <!--Tabla que muestra la lista de vehículos y envía como formulario el campo id_vehiculo para la consulta de servicios -->
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
                        <td class="tdcolor">
                            <form action="listaServicios.php" method="POST">
                                <input id="matricula" name="matricula" style="background-image: url('../IMG/matricula-vacia.png');" value="<?php echo $registro['matricula'] ?>" readonly>
                                <input type="hidden" name="id_vehiculo" value="<?php echo $registro['id_vehiculo'] ?>">
                                <input type="submit" value="Consultar lista de servicios">
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <br>
    <!--Formulario que añade un nuevo vehículo -->

    <div class="divFormulario">
        <form action="insertarVehiculos.php" method="POST" target="_self">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usu ?>">
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

    <?php if($res_admin==1): ?>
    <div class="divFormulario">
        <form action="insertarUsuario.php" method="POST" target="_self">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usu ?>">
            <input type="hidden" name="username" value="<?php echo $usu ?>">
            <input type="hidden" name="pass" value="<?php echo $pass ?>">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido1" placeholder="Primer apellido">
            <input type="text" name="apellido2" placeholder="Segundo apellido">
            <input type="text" name="password" placeholder="Contraseña">
            <input type="date" name="fecha_alta" placeholder="Fecha de alta">
            <input type="submit" value="Añadir usuario">
        </form>
    </div>
<?php endif; ?>

    <footer>
        <?php require('../HTML/footer.html') ?>
    </footer>
</body>


</html>