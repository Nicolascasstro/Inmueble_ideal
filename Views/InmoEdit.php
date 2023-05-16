<?php
require_once('../Models/conexion.php');
require_once('../Models/consultas.php');
require_once('../Controllers/mostrarInfo.php');
require_once('../Models/validarSesion.php');
require_once('../Models/permisosInmo.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inmueble || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main class="edit">
        <header>
            <h2>Modificar Inmueble</h2>
            <a href="InmoApartamentos.php" class="back"></a>
            <a href="../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <?php
        cargarInmuebleEdit();
        ?>
    </main>
</body>
</html>