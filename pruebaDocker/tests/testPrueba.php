<?php
require('C:\xampp\htdocs\Practica1Taller\ArchivosPHP\sesion.php');

use PHPUnit\Framework\TestCase;
//include("../../ArchivosPHP/sesion.php");


class testPrueba extends TestCase {

    public function testCorreo(): void {
        $correo = "pruebacorreo@gmail.com";
        $this->assertTrue(comprobarCorreo($correo));
        
    }
}
+




function comprobarCorreo($correo){
    $subcadena = substr($correo,-10);
    if($subcadena == "@gmail.com"){
        echo("es un correo");
        return true;
        
    } else{
        echo("no es un correo");
        return false;
    }
}
?>
?>
