<?php

session_start();

if(!isset($_SESSION['autenticado'])){

    echo "<script>alert('No has iniciado Sesion')</script>";
    echo "<script> location.href='../Views/login.php'</script>";

}

if($_SESSION['rol']!="usuario"){

    echo "<script>alert('Tu rol no tiene permisos para acceder a esta vista')</script>";
    echo "<script> location.href='../Views/login.php'</script>";

}


?>