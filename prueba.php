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

echo "Hola Mundo";

//Ejercicio 1//
echo "Hello world!";

//Ejercicio 2//
$frase="Hello  world!!";

//Ejercicio 3//

$numero=0;
$decimal=0.1;
$fraseee="Hola";

var_dump($numero);
var_dump($decimal);
var_dump($fraseee);

//Ejercicio 4//
$boolean=true;
$null=null;

//Ejercicio 5//
$numero1=4;
$numero2=6;
$pow=pow($numero1,$numero2);

echo($numero1 + $numero2. "<br>");
echo($numero1 - $numero2 . "<br>");
echo($numero1 * $numero2 . "<br>");
echo($numero1 / $numero2 . "<br>");
echo($numero1 % $numero2 . "<br>");
echo($pow . "<br>");

//Ejercicio 6//
$frase1="Juanje eres un ";
$frase2="puto payaso que no sirves para nada  <br>";

echo($frase1 . $frase2);

//Ejercicio 7//
$string="1";
$string2="diez manzanas";
echo($string . "<br>");
var_dump($string * 2); //hace la conversion
var_dump($string * 1.3); //hace la conversion
//var_dump($string * $string2); ERROR

//Ejercicio 8//
$boolean1=false;
$boolean2=true;
var_dump($boolean1 && $boolean2 . "<br>");// si los dos no son true, te devuelve false
var_dump($boolean1 || $boolean2 . "<br>"); //si uno de los dos es true, te devuelve true 





?>
</body>
</html>