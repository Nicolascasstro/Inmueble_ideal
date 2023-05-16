<?php

class Consultas{

public function registrarUsuario($id,$nombres,$apellidos,$telefono,$correo,$claveMd,$rol){

    // VALIDAR SI EL USUARIO SE ENCUENTRA REGISTRADO

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    // Validaremos si el usuario ya se encuantra registrado apartir de un select y un if

    $sql = "SELECT * FROM usuarios WHERE id = :id OR correo = :correo";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':id', $id);
    $statement->bindParam(':correo', $correo);

    $statement->execute();

    // variable f solo existira si hay algun registro con la id o el email en la tabla usuarios
    

    if($result = $statement->fetch()){
        echo "<script>alert('La informacion del usuario que intenta registrar ya se encuentra almacenado')</script>";
        echo "<script> location.href='../Views/register.php'</script>";
    }else{

    // En este else se hace el insert 

        $modelo = new Conexion();

        $conexion = $modelo->get_conexion();

        $sql = "INSERT INTO usuarios (id,nombres,apellidos,telefono,correo,clave,rol)
        VALUES (:id, :nombres, :apellidos, :telefono, :correo, :clave, :rol)";

        $statement = $conexion->prepare($sql);

        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombres', $nombres);
        $statement->bindParam(':apellidos', $apellidos);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':correo', $correo);
        $statement->bindParam(':clave', $claveMd);
        $statement->bindParam(':rol', $rol);

        if(!$statement){
            echo "No se logro Registrar";
        }else{

            $statement->execute();
            echo "<script>alert('Usuario Registrado Con exito')</script>";
            echo "<script> location.href='../Views/login.php'</script>";
        }


    }

}

public function registrarInmueble($tipo,$categoria,$precio,$tamano,$ciudad,$barrio,$foto){

        $modelo = new Conexion();

        $conexion = $modelo->get_conexion();

        $sql = "INSERT INTO inmuebles (foto,tipo,categoria,precio,tamano,ciudad,barrio)
        VALUES (:foto, :tipo, :categoria, :precio, :tamano, :ciudad, :barrio)";

        $statement = $conexion->prepare($sql);

        $statement->bindParam(':foto', $foto);
        $statement->bindParam(':tipo', $tipo);
        $statement->bindParam(':categoria', $categoria);
        $statement->bindParam(':precio', $precio);
        $statement->bindParam(':tamano', $tamano);
        $statement->bindParam(':ciudad', $ciudad);
        $statement->bindParam(':barrio', $barrio);

        if(!$statement){
            echo "No se logro Registrar";
        }else{

            $statement->execute();
            echo "<script>alert('Inmueble Registrado Con exito')</script>";
            echo "<script> location.href='../Views/InmoApartamentos.php'</script>";
        }


}

public function consultarInmueble(){

    $rows = null;

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "SELECT * FROM inmuebles ORDER BY id DESC";

    $statement = $conexion->prepare($sql);

    $statement->execute();

    while($result = $statement->fetch()){

        $rows[] = $result;

    }

    return $rows;   
}

public function eliminarInmueble($id){

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "DELETE FROM inmuebles WHERE id = :id";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':id', $id);

    if(!$statement){
        echo "no se logro el eliminar";
    }else{
        $statement->execute();
        echo "<script>alert('Inmueble Eliminado Con exito')</script>";
        echo "<script> location.href='../Views/InmoApartamentos.php'</script>";
        
    }
}

public function consultarInmuebleEdit($id){

    $rows = null;

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "SELECT * FROM inmuebles WHERE id = :id";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':id', $id);

    $statement->execute();

    while($result = $statement->fetch()){

        $rows[] = $result;

    }

    return $rows;   

}

public function modificarInmueble($id,$tipo,$categoria,$precio,$tamano,$ciudad,$barrio){

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "UPDATE inmuebles SET tipo = :tipo, categoria = :categoria, precio = :precio, tamano = :tamano,
    ciudad = :ciudad, barrio = :barrio WHERE id = :id";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':tipo', $tipo);
    $statement->bindParam(':categoria', $categoria);
    $statement->bindParam(':precio', $precio);
    $statement->bindParam(':tamano', $tamano);
    $statement->bindParam(':ciudad', $ciudad);
    $statement->bindParam(':barrio', $barrio);
    $statement->bindParam(':id', $id);

    if(!$statement){
        echo "No se logro Actualizar";
    }else{

        $statement->execute();
        echo "<script>alert('Inmueble Actualizado Con exito')</script>";
        echo "<script> location.href='../Views/InmoApartamentos.php'</script>";
    }


}

public function consultarInmuebleUser(){

    $rows = null;   

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "SELECT * FROM inmuebles ORDER BY id DESC";

    $statement = $conexion->prepare($sql);

    $statement->execute();

    while($result = $statement->fetch()){

        $rows[] = $result;

    }

    return $rows;   
}

public function registrarSolicitud($id_inm,$id_user,$fecha){

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "INSERT INTO solicitudes (id_inm,id_user,fecha)
    VALUES (:id_inm, :id_user, :fecha)";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':id_inm', $id_inm);
    $statement->bindParam(':id_user', $id_user);
    $statement->bindParam(':fecha', $fecha);

    if(!$statement){
        echo "No se logro La solicitud";
    }else{

        $statement->execute();
        echo "<script>alert('Solicitud enviada Con exito')</script>";
        echo "<script> location.href='../Views/userDashboard.php'</script>";
    }
}

public function verSolicitudes(){

    $rows = null;

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "SELECT 
            solicitudes.id_sol,
            inmuebles.foto,
            inmuebles.tipo, 
            inmuebles.barrio, 
            inmuebles.ciudad, 
            usuarios.nombres 
            FROM solicitudes 
            INNER JOIN inmuebles on solicitudes.id_inm = inmuebles.id 
            INNER JOIN usuarios on solicitudes.id_user = usuarios.id";

    $statement = $conexion->prepare($sql);

    $statement->execute();

    while($result = $statement->fetch()){

        $rows[] = $result;

    }

    return $rows;   

}

public function mostrarSolicitudes($id_sol){

    $rows = null;

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "SELECT 
            solicitudes.id_sol,
            inmuebles.foto,
            inmuebles.tipo, 
            inmuebles.barrio, 
            inmuebles.ciudad, 
            usuarios.nombres 
            FROM solicitudes 
            INNER JOIN inmuebles on solicitudes.id_inm = inmuebles.id 
            INNER JOIN usuarios on solicitudes.id_user = usuarios.id
            WHERE id_sol = :id_sol";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':id_sol', $id_sol);

    $statement->execute();

    while($result = $statement->fetch()){

        $rows[] = $result;

    }

    return $rows;   

}

public function mostrarSolicitudToShow($id_sol){

    $rows = null;

    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();

    $sql = "SELECT 
            solicitudes.id_sol,
            solicitudes.fecha,
            inmuebles.foto,
            inmuebles.tipo,
            inmuebles.categoria,
            inmuebles.precio,
            inmuebles.barrio, 
            inmuebles.ciudad, 
            usuarios.nombres,
            usuarios.telefono,
            usuarios.correo
            FROM solicitudes 
            INNER JOIN inmuebles on solicitudes.id_inm = inmuebles.id 
            INNER JOIN usuarios on solicitudes.id_user = usuarios.id
            WHERE id_sol = :id_sol";

    $statement = $conexion->prepare($sql);

    $statement->bindParam(':id_sol', $id_sol);

    $statement->execute();

    while($result = $statement->fetch()){

        $rows[] = $result;

    }

    return $rows;   

} 






  


}




?>