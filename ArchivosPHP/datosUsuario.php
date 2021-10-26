
<?php

//Datos de conexión a BBDD
$db_host = "localhost";
$db_name = "tallerServidores";
$db_user = "admin";
$db_pass = "Admin123";


//Establecer conexión con BBDD



if(include 'Conexion.php'){
    echo "Conexión existosa.";
    //Consulta a la tabla de usuarios
    $usu = $_POST['username'];
    $pass = $_POST['pass'];
    
    include ('listaUsuarios.php');
    include ('listaVehiculos.php');


    $username = $usu;
    $pwd = $pass;




    //Comprobar si viene con método post y que haga INSERT (botón guardar)
    function insertarVehiculo(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'Conexion.php';
            $id = "SELECT id_usuario FROM datos_usuario where nombre = $usu AND pass = $pass";
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $matricula = $_POST['matricula'];
            $combustible = $_POST['combustible'];
            $tipo_motor = $_POST['tipo_motor'];
            $usu = $_POST['username'];
            $pass = $_POST['pass'];

            $insertar = $conn -> query("INSERT INTO lista_vehiculos (id_usuario,marca,modelo,matricula,combustible,tipo_motor) VALUES ('$id','$marca','$modelo','$matricula','$combustible','$tipo_motor')");

            $resV = mysqli_query($conn, $sql);

            if ($resV === false) {
                echo mysqli_error($conn);
            } else {
                $users = mysqli_fetch_all($resV, MYSQLI_ASSOC);
            }
        }
    }






    //Consulta a la tabla lista de vehículos

}
?>
<?php
    require "../ArchivosCSS/header.html"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del usuario</title>
    <style>
        * {
            margin: 0;
        }

        body {
            background: rgb(150,0,0);
            background: -moz-linear-gradient(90deg, rgba(150,0,0,1) 0%, rgba(45,1,1,1) 0%, rgba(150,0,0,1) 67%, rgba(101,1,1,1) 93%);
            background: -webkit-linear-gradient(90deg, rgba(150,0,0,1) 0%, rgba(45,1,1,1) 0%, rgba(150,0,0,1) 67%, rgba(101,1,1,1) 93%);
            background: linear-gradient(90deg, rgba(150,0,0,1) 0%, rgba(45,1,1,1) 0%, rgba(150,0,0,1) 67%, rgba(101,1,1,1) 93%);
        }

        button {
            cursor: pointer;
        }

        caption {
            caption-side: top;
        }

        .divFormulario{
            display: flex;
        align-items: center;
        justify-content: center;   
        border-radius: 2px;
        }
        .tabla{
            background:black;
            border-color: black;
            color: black;
        }
        .tdcolor{
            background-color:rgba(255,255,255,0.8);

        }
    </style>
</head>

<body style="position:relative;margin:0;-zindex:0 ;color:rgba(255,255,255,0.8);">




    <div class="divFormulario">
        <table class="tabla"  style="border-spacing:3px; border-collapse:separate; width:50%;">
            <caption style="caption-side: top;">Datos del usuario</caption>
            <thead>
                <tr>
                    <th class="tdcolor">Nombre</th>
                    <th class="tdcolor">Primer Apellido</th>
                    <th class="tdcolor">Segundo Apellido</th>
                    <th class="tdcolor">Fecha alta</th>
                    <th class="tdcolor">Numero vehiculos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $registro) : ?>
                    <tr>
                        <td class="tdcolor"><center><?php echo $registro['nombre'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['apellido1'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['apellido2'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['fecha_alta'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['numero_vehiculos'] ?></center></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="divFormulario">
        <table  class="tabla"  style="border-spacing:3px; border-collapse:separate;  width:50%;">
            <caption>Lista de vehículos</caption>
            <thead>
                <tr>
                    <th class="tdcolor">Marca</th>
                    <th class="tdcolor">Modelo</th>
                    <th class="tdcolor">Matricula</th>
                    <th class="tdcolor">Combustible</th>
                    <th class="tdcolor">Tipo de Motor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coches as $registro) : ?>
                    <tr>
                        <td class="tdcolor"><center><?php echo $registro['marca'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['modelo'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['matricula'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['combustible'] ?></center></td>
                        <td class="tdcolor"><center><?php echo $registro['tipo_motor'] ?></center></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="divFormulario">
        <form action="datosUsuario.php" method="POST" target="self" >
            <input  type="hidden" name="username" value="<?php echo $usu; ?>">
            <input type="hidden" name="pass" value="<?php echo $pass; ?>">
            <input type="text" name="marca" placeholder="Marca">
            <input type="text" name="modelo" placeholder="modelo">
            <input type="text" name="matricula" maxlength="7" placeholder="matricula">
            <input type="text" name="combustible" placeholder="combustible">
            <input type="text" name="tipo_motor" placeholder="tipo de motor">
            <input type="submit" value="guardar" onclick="insertarVehiculo()">
        </form>
    </div>


</body>

</html>
<?php
    require "../ArchivosCSS/footer.html"
    ?>