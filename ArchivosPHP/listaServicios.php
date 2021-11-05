<?php

include('conexion.php');

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_v = $_POST['id_vehiculo'];
        $matricula = $_POST['matricula'];
        //--------------------------------------------------------------------------


        //--------------------------------------------------------------------------
        //Consulta de servicios (llama archivo consultaListaServicios.php)

        include('consultaListaServicios.php');

        //--------------------------------------------------------------------------
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
    <title>Lista de servicios</title>
    <link rel="stylesheet" href="../CSS/tablas.css">
</head>

<body>
    <div class="divFormulario">
        <table border="2px" style="border-spacing:15px; border-collapse:separate;color:black;">
            <caption>Lista de servicios</caption>
            <thead>
                <tr>
                    <th>ID vehiculo</th>
                    <th>Matrícula</th>
                    <th>Servicio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaServicios as $registro) : ?>
                    <tr>
                        <form action="listaServicios.php" method="POST">
                            <td><input name="id_vehiculo" type="text" value="<?php echo $id_v ?>"></td>
                            <td><input name="matricula" type="text" value="<?php echo $matricula?>"></td>
                            <td><?php echo $registro['servicio'] ?></td>
                            <td><input name="id_servicio" value="<?php echo $registro['id_servicio'] ?>" readonly></td>
                            <td><input id="boton" type="submit" value="Consultar detalles del servicio" onclick="ocultarDetallesServicios()"></td>
                        </form>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!--Formulario que añade un nuevo servicio -->

    <div style="background: white;">
        <form action="insertarServicio.php" method="POST" target="_self">
            <input type="hidden" name="id_vehiculo" value="<?php echo $id_v ?>">
            <input name="matricula" value="<?php echo $matricula ?>" readonly>
            <input type="text" name="servicio" placeholder="Servicio">
            <input type="date" name="ultima_revision" placeholder="Última revisión">
            <input type="date" name="proxima_revision" maxlength="7" placeholder="Próxima revisión">
            <input type="text" name="detalles" placeholder="detalles">
            <input type="submit" value="guardar">
        </form>
    </div>

    <?php
    include('consultaDetallesServicios.php');

    if (isset($_POST['id_servicio'])) : ?>

        <div id="tabla_detalles_servicios">
            <table border="2px" style="border-spacing:15px; border-collapse:separate;color:black;">
                <caption>Detalles de servicios</caption>
                <thead>
                    <tr>
                        <th>Última revisión</th>
                        <th>Próxima revisión</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detallesServicios as $registro) : ?>
                        <tr>
                            <td><?php echo $registro['ultima_revision'] ?></td>
                            <td><?php echo $registro['proxima_revision'] ?></td>
                            <td><?php echo $registro['comentarios'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</body>

</html>
<script src="../JS/tablas.js"></script>