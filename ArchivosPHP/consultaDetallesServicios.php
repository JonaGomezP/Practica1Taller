<?php 
require('conexion.php');
$id_ser = $_POST['id_servicio'];
$detalles_servicios =  "SELECT ultima_revision,proxima_revision,comentarios FROM lista_servicios WHERE id_servicio = $id_ser";

$resultadosDetallesServicios = mysqli_query($conn, $detalles_servicios);

if ($resultadosDetallesServicios === false) {
    echo mysqli_error($conn);
} else {
        $detallesServicios = mysqli_fetch_all($resultadosDetallesServicios, MYSQLI_ASSOC);
}

?>
