<?php 
$sqlVehiculos =  "SELECT marca,modelo,matricula,combustible, tipo_motor,id_vehiculo
FROM lista_vehiculos 
where (SELECT id_usuario from datos_usuario where nombre = '$usu' AND pass = '$pass')=id_usuario";


$resultadosVehiculos = mysqli_query($conn, $sqlVehiculos);

if ($resultadosVehiculos === false) {
    echo mysqli_error($conn);
} else {
        $coches = mysqli_fetch_all($resultadosVehiculos, MYSQLI_ASSOC);
}
?>