<?php
require_once('../Models/conexion.php');
require_once('../Models/consultas.php');
require_once('../Controllers/mostrarInfo.php');
require_once('../Models/validarSesion.php');
require_once('../Models/permisosUsuario.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Inmueble - Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main class="show">
        <header>
            <h2>Consultar Inmueble</h2>
            <a href="UserDashboard.php" class="back"></a>
            <a href="../Controllers/cerrarSesion.php" class="close"></a>
        </header>
                <?php
                    mostrarInmuebleUser();
                ?>
    
    </main>
</body>
</html>