<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabecera</title>
    <style>
        * {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 62, 5%;
        }
        .claseheader {
            background: rgba(0, 0, 0, 0.2);
            background: -moz-linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(85, 4, 4, 1) 34%, rgba(168, 1, 1, 1) 47%, rgba(178, 1, 1, 1) 64%, rgba(244, 4, 4, 1) 71%, rgba(255, 255, 255, 1) 82%, rgba(255, 255, 255, 1) 96%);
            background: -webkit-linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(85, 4, 4, 1) 34%, rgba(168, 1, 1, 1) 47%, rgba(178, 1, 1, 1) 64%, rgba(244, 4, 4, 1) 71%, rgba(255, 255, 255, 1) 82%, rgba(255, 255, 255, 1) 96%);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(85, 4, 4, 1) 34%, rgba(168, 1, 1, 1) 47%, rgba(178, 1, 1, 1) 64%, rgba(244, 4, 4, 1) 71%, rgba(255, 255, 255, 1) 82%, rgba(255, 255, 255, 1) 96%);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#000000", endColorstr="#ffffff", GradientType=1);
            padding: 2rem;
            margin: 0;
            margin-top: 0.5rem;
        }
        
        header {
            width: 99%;
            background: url("../IMG/coche.png")no-repeat;
            position: relative;
            height: 13, 7rem;
            background-position-x: right;
        }
        
        .textoheader {
            font-size: 6rem;
            text-align: center;
            color: rgba(0, 0, 0, 0.8);
            text-decoration: cursive;
            box-shadow: 10px 10px 10px 10px black;
        }
        #inicioSesion{
            display: flex;
            position: absolute;
            right: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            font-size: 26px;
            align-items: center;
            margin-top: 1em;
            font-size: 16px;
        }

        p img{
            width: 35px;
            height: 35px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="claseheader">
        <header class="textoheader"><em>Parrapu Motor</em></header>
    </div>
    <p id="inicioSesion"><img src="../IMG/user.png" alt="<?php echo($_SESSION['nombre'])?>"><?php echo($_SESSION['nombre'])?></p>

</body>

</html>