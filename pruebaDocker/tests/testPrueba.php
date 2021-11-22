<?php
require('C:\xampp\htdocs\Practica1Taller\ArchivosPHP\sesion.php');

use PHPUnit\Framework\TestCase;
//include("../../ArchivosPHP/sesion.php");


class testPrueba extends TestCase {

    public function testCorreo(): void {
        $correo = "pruebacorreo@gmail.com";
        $this->assertTrue(comprobarCorreo($correo));

        $correo = "pruebacorreo@outlook.com";
        $this->assertFalse(comprobarCorreo($correo));
    }
}
?>
