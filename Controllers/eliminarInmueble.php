<?php
require_once('../Models/conexion.php');
require_once('../Models/consultas.php');


if(isset($_GET['id_inmueble'])){

    $id = $_GET['id_inmueble'];

    $consultas = new Consultas();

    $statement = $consultas->eliminarInmueble($id);

}

?>