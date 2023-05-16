<?php

class Sesion{

public function iniciarSesion($correo,$clave){

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "SELECT * FROM usuarios WHERE correo = :correo";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':correo', $correo);

    $statement->execute();

    // Lo que hicimos anteriormente es para validar si el email del usuario esta registrado
    // Correctamente


    // Este if solo se cumple si el email concuerda
    if($result = $statement->fetch()){

        // Ahora vamos a validar la clave ingresada
        if($clave == $result['clave']){

            // Aqui vamos a hacer el inicio de sesion
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['rol'] = $result['rol'];
            $_SESSION['autenticado'] = "SI";

            // Lo anterior es para el arhivo de seguridad de permisos de rutas

            if($result['rol'] == "usuario"){

                echo "<script>alert('Bienvenido Usuario')</script>";
                echo "<script> location.href='../Views/userDashboard.php'</script>";

            }

            if($result['rol'] == "inmobiliaria"){

                echo "<script>alert('Bienvenido Inmobiliaria')</script>";
                echo "<script> location.href='../Views/InmoDashboard.php'</script>";

            }

        }else{
            echo "<script>alert('Clave Incorrecta')</script>";
            echo "<script> location.href='../Views/login.php'</script>";
        }

    }else{
        echo "<script>alert('El email no se encuantra registrado en el sistema, verifique los datos')</script>";
        echo "<script> location.href='../Views/login.php'</script>";
    }

}

public function cerrarSesion(){

    session_start();
    session_destroy();

    echo '<script> location.href="../Views/login.php" </script>';
}


}

?>