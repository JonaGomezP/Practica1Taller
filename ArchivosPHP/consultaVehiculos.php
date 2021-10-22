<?php 
$sqlVehiculos =  "SELECT marca,modelo,matricula,combustible, tipo_motor
FROM lista_vehiculos_prueba 
where (SELECT id_usuario from datos_usuario where nombre = '$usu' AND pass = '$pass')=id_usuario";


$resultadosVehiculos = mysqli_query($conn, $sqlVehiculos);

if ($resultadosVehiculos === false) {
    echo mysqli_error($conn);
} else {
        $coches = mysqli_fetch_all($resultadosVehiculos, MYSQLI_ASSOC);
}
