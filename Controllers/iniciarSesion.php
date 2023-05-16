<?php

require_once('../Models/conexion.php');
require_once('../Models/validarSesion.php');

$correo = $_POST['correo'];
$clave = md5($_POST['clave']);

$objSesion = new Sesion();

$statement = $objSesion->iniciarSesion($correo,$clave);

?>