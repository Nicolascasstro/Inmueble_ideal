<?php

require_once('../Models/conexion.php');
require_once('../Models/consultas.php');



$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$tamano = $_POST['tamano'];
$ciudad = $_POST['ciudad'];
$barrio = $_POST['barrio'];

if(strlen($tipo) > 0 && strlen($categoria) > 0 && strlen($precio) > 0 && strlen($tamano) > 0 && strlen($ciudad) > 0 && strlen($barrio) > 0){

// Definimos la ruta a guardar en la base de datos
$foto = "../upload/" .$_FILES['foto']['name'];

// Este es el codigo que mueve la imagen en la ruta definida en la variable foto
$resultado = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

$consultas = new Consultas();

$consultas->registrarInmueble($tipo,$categoria,$precio,$tamano,$ciudad,$barrio,$foto);


}else{
    echo "<script>alert('Por favor Complete todos los campos')</script>";
    echo "<script> location.href='../Views/InmoAdd.php'</script>";
}