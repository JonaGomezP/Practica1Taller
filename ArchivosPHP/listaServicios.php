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

        session_start();

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
    <link rel="stylesheet" href="../CSS/common.css">
    <link rel="stylesheet" href="../CSS/tablas.css">


</head>

<body>
    <header>
        <?php require('../Comun/header.php'); ?>
    </header>

    <!--Tabla que muestra la lista de servicios -->
    <div class="divFormulario">
        <table>
            <caption>Lista de servicios</caption>
            <thead>
                <tr>
                    <th class="tdcolor">ID vehiculo</th>
                    <th class="tdcolor">Matrícula</th>
                    <th class="tdcolor">Servicio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaServicios as $registro) : ?>
                    <tr>
                        <form action="listaServicios.php" method="POST">
                            <td class="tdcolor"><input class="lista_ser" name="id_vehiculo" type="text" value="<?php echo $id_v ?>"></td>
                            <td class="tdcolor"><input class="lista_ser" name="matricula" type="text" value="<?php echo $matricula ?>" readonly></td>
                            <td class="tdcolor"><?php echo $registro['servicio'] ?></td>
                            <input class="lista_ser" type="hidden" name="id_servicio" value="<?php echo $registro['id_servicio'] ?>" >
                            <td class="celda_boton">
                                <input id="enviar_detalles" type="submit" value="Detalles" onmouseover="mostrarDetalles()" onmouseout="ocultarDetalles()">
                            </td>
                        </form>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!--Formulario que añade un nuevo servicio -->

    <div class="divFormulario">
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

    if (isset($_POST['id_servicio'])) :
        include('consultaDetallesServicios.php');
    ?>

        <div class="divFormulario" id="detalles_servicios" style="visibility: hidden;">
            <table>
                <caption>Detalles de servicios</caption>
                <thead>
                    <tr>
                        <th class="tdcolor">Última revisión</th>
                        <th class="tdcolor">Próxima revisión</th>
                        <th class="tdcolor">Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detallesServicios as $registro) : ?>
                        <tr>
                            <td class="tdcolor"><?php echo $registro['ultima_revision'] ?></td>
                            <td class="tdcolor"><?php echo $registro['proxima_revision'] ?></td>
                            <td class="tdcolor"><?php echo $registro['comentarios'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <footer>
        <?php require('../Comun/footer.php') ?>

    </footer>
</body>

</html>
<script src="../JS/tablas.js"></script>