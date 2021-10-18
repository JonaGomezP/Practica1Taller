<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Servicio</title>
    <style>
        body{background:steelblue}

        .Formulario{
            margin: 2%;
            padding: 2%;
            display: flex;
            justify-content: center;
            border-radius: 10px;
           
        }
        .submit{
            display: block;
        }

        .detalle{
            color: blue;
            font-weight: 700;
            background-color: cadetblue;
            border-radius: 10px;
        }
        fieldset{
            border-color: blue;
            
            border-radius: 10px;
            background-color: cadetblue;

        }
       
        textarea{
            background-color: blanchedalmond;
        }

    </style>
</head>
<body>
    <div class="Formulario">
    <form>
        <fieldset class="bordelinea">
        <legend class="detalle">Detalle del Servicio</legend>
        <textarea name="texto" rows="28" cols="200"></textarea>
        <input type="submit" class="submit">
        </fieldset>
    </form>
    <div>
</body>
</html>