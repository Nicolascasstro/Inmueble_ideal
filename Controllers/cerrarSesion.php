<?php

require_once('../Models/validarSesion.php');

$objSesion = new Sesion();

$result = $objSesion->cerrarSesion();


?>