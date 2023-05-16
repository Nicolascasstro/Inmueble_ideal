<?php

class Conexion{

public function get_conexion(){

$user = "root";
$host = "localhost";
$pass = "";
$dbname= "inmueble_ideal";

$conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
return $conexion;


}



}


?>