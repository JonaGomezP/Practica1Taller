<?php
$sqlusuarios =  "SELECT nombre,apellido1,apellido2,fecha_alta,numero_vehiculos
FROM datos_usuario
where nombre = '$usu' AND pass = '$pass'";

$resultadosUsuarios = mysqli_query($conn, $sqlusuarios);

if ($resultadosUsuarios === false) {
echo mysqli_error($conn);
} else {
$users = mysqli_fetch_all($resultadosUsuarios, MYSQLI_ASSOC);
}
