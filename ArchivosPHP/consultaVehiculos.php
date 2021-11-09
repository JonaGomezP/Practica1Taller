<?php 
require('conexion.php');

$sqlVehiculos =  "SELECT marca,modelo,matricula,combustible, tipo_motor,id_vehiculo,id_usuario
FROM lista_vehiculos 
where (SELECT id_usuario from datos_usuario where nombre = '$usu' AND pass = '$pass')=id_usuario";


$resultadosVehiculos = mysqli_query($conn, $sqlVehiculos);

if ($resultadosVehiculos === false) {
    echo mysqli_error($conn);
} else {
        $coches = mysqli_fetch_all($resultadosVehiculos, MYSQLI_ASSOC);
}

//COUNT de coches que tienen el id del usuario activo
foreach ($coches as $valor) {
    $id_prueba = $valor['id_usuario'];
}

$sqlNumeroVehiculos =  "SELECT COUNT(*) as numero_vehiculos
FROM lista_vehiculos WHERE (SELECT id_usuario from datos_usuario where nombre = '$usu' AND pass = '$pass')=id_usuario";

$resultadoNumeroVehiculos = mysqli_query($conn, $sqlNumeroVehiculos);

if ($resultadoNumeroVehiculos === false) {
echo mysqli_error($conn);
} else {
    $numVeh = mysqli_fetch_all($resultadoNumeroVehiculos, MYSQLI_ASSOC);
}

$cuenta = $numVeh[0]["numero_vehiculos"];

?>