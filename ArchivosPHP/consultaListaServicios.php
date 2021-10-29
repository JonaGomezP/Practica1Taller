<?php 
require('conexion.php');
$id_veh = $_POST['id_vehiculo'];
$lista_servicios =  "SELECT id_servicio,matricula,servicio FROM lista_servicios WHERE id_vehiculo = '$id_veh'";

$resultadosListaServicios = mysqli_query($conn, $lista_servicios);

if ($resultadosListaServicios === false) {
    echo mysqli_error($conn);
} else {
        $listaServicios = mysqli_fetch_all($resultadosListaServicios, MYSQLI_ASSOC);
}
?>
