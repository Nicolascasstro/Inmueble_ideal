<?php

require_once('../Models/conexion.php');
require_once('../Models/consultas.php');
require_once('../Models/validarSesion.php');

$id_inm = $_GET['id_inmueble'];

session_start();

$id_user = $_SESSION['id'];

$fecha = date('Y-m-d');

$consultas = new Consultas();

$mensaje = $consultas->registrarSolicitud($id_inm,$id_user,$fecha);

?>