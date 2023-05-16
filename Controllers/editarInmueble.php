<?php

require_once('../Models/conexion.php');
require_once('../Models/consultas.php');

$id= $_POST['id'];
$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$tamano = $_POST['tamano'];
$ciudad = $_POST['ciudad'];
$barrio = $_POST['barrio'];

if(strlen($tipo) > 0 && strlen($categoria) > 0 && strlen($precio) > 0 && strlen($tamano) > 0 && strlen($ciudad) > 0 && strlen($barrio) > 0){


$consultas = new Consultas();

$consultas->modificarInmueble($id,$tipo,$categoria,$precio,$tamano,$ciudad,$barrio);


}else{
    echo "<script>alert('Por favor Complete todos los campos')</script>";
    echo "<script> location.href='../Views/InmoApartamentos.php'</script>";
}