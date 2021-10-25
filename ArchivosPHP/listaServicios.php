<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('consultaListaServicios.php');
    ?>
<div class="divFormulario">
        <table border="2px" style="border-spacing:15px; border-collapse:separate;color:black;">
            <caption>Lista de servicios</caption>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Cambio de aceite</th>
                    <th>Cambio de filtros</th>
                    <th>Correa de distribución</th>
                    <th>Gomas</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servicios as $registro) : ?>
                    <tr>
                        <td><?php echo $registro['matricula'] ?></td>
                        <td><?php echo $registro['cambio_aceite'] ?></td>
                        <td><?php echo $registro['cambio_filtros'] ?></td>
                        <td><?php echo $registro['correa_distribucion'] ?></td>
                        <td><?php echo $registro['gomas'] ?></td>
                        <td><?php echo $registro['detalles'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>