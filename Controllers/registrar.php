<?php

require_once('../Models/conexion.php');
require_once('../Models/consultas.php');


$id = $_POST['identificacion'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

if(strlen($id) > 0 && strlen($nombres) > 0 && strlen($apellidos) > 0 && strlen($telefono) > 0 && strlen($correo) > 0 && strlen($clave) > 0 && strlen($rol) > 0){

// Encriptacion de la contraseña
$claveMd = md5($clave);

$consultas = new Consultas();

$consultas->registrarUsuario($id,$nombres,$apellidos,$telefono,$correo,$claveMd,$rol);


}else{
    echo "<script>alert('Por favor Complete todos los campos')</script>";
    echo "<script> location.href='../Views/register.php'</script>";
}






?>