<?php

function cargarInmuebles(){

    $consultas = new Consultas();

    $filas = $consultas->consultarInmueble();

    if(!isset($filas)){

        echo '  <tr>
                    <td style="text-align:center">No hay Inmuebles Registrados</td>
                </tr>';
    }else{

    foreach($filas as $fila){

            echo '

                <tr>
                    <td>
                        <figure class="photo">
                            <img src="'.$fila['foto'].'" alt="">
                        </figure>
                        <div class="info">
                            <h3>'.$fila['tipo'].'</h3>
                            <h4>'.$fila['precio'].'</h4>
                            <p>'.$fila['ciudad']."/".$fila['barrio'].'</p>
                        </div>
                        <div class="controls">
                            
                            <a href="InmoEdit.php?id_inmueble='.$fila['id'].'" class="edit"></a>
                            <a href="../Controllers/eliminarInmueble.php?id_inmueble='.$fila['id'].'" class="delete"></a>
                        </div>
                    </td>
                </tr>     
            ';
        }
    }

}

// Esta funcion es solo para traer la informacion del inmueble en el formulario

function cargarInmuebleEdit(){

    // Creamos la variable que aterriza el id del inmueble enviado por metodo get

    $id = $_GET['id_inmueble'];

    $consultas = new Consultas();

    $filas = $consultas->consultarInmuebleEdit($id);

    foreach($filas as $fila){

        echo'

        <form action="../Controllers/editarInmueble.php" method="post">
            <input type="number" value="'.$fila['id'].'" name="id" style="display:none">
            <div class="select">
                <select name="tipo">
                    <option value="'.$fila['tipo'].'">'.$fila['tipo'].'</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Aparta Estudio">Aparta Estudio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            <div class="select">
                <select name="categoria">
                    <option value="'.$fila['categoria'].'">'.$fila['categoria'].'</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta">Venta</option>
                </select>
            </div>
            <input type="number" placeholder="Precio..." name="precio" value="'.$fila['precio'].'">
            <input type="number" placeholder="Tamaño..." name="tamano" value="'.$fila['tamano'].'">
            <input type="text" placeholder="Ciudad..." name="ciudad" value="'.$fila['ciudad'].'">
            <input type="text" placeholder="Localidad/Barrio..." name="barrio" value="'.$fila['barrio'].'">
            
            <button type="submit" class="btn-home">Modificar</button>
        </form>
        
        ';
    }



}

function cargarInmuebleUser(){

    // Creamos la variable que aterriza el id del inmueble enviado por metodo get

    $consultas = new Consultas();

    $filas = $consultas->consultarInmuebleUser();

    foreach($filas as $fila){

        echo'

                    <div class="card-inmueble">
                    <img src="'.$fila['foto'].'" alt="">
                    <div class="info-card">
                        <h4>Valor de '.$fila['categoria'].':</h4>
                        <h2>$'.$fila['precio'].'</h2>
                        <p>'.$fila['tipo'].' - '.$fila['tamano'].'</p>
                        <p class="direccion">'.$fila['ciudad'].'/'.$fila['barrio'].'</p>
                        <a href="UserShowInmueble.php?id_inmueble='.$fila['id'].'">Ver Más</a>
                    </div>
                </div>
        ';
    }



}

function mostrarInmuebleUser(){

    $id = $_GET['id_inmueble'];

    $consultas = new Consultas();

    $filas = $consultas->consultarInmuebleEdit($id);

    foreach($filas as $fila){

        echo ' 
            <figure class="photo-preview"> 
            <img src="'.$fila['foto'].'" alt="" width="100%"> 
            </figure> <div class="cont-details"> 
            <div> 
            <article class="info-name"><p>'.$fila['tipo'].'</p>
            </article> <article class="info-category"><p>'.$fila['categoria'].'</p>
            </article> <article class="info-precio"><p>'.$fila['precio'].'</p></article> 
            <article class="info-direccion"><p>'.$fila['barrio'].'/'.$fila['ciudad'].'</p>
            </article> <article class="info-tamano"><p>'.$fila['tamano'].'</p></article> 
            
            <a href="../Controllers/registrarSolicitud.php?id_inmueble='.$fila['id'].'" class="btn-home">Solictar cita</a> 
            </div> 
            </div> ';

    



    }
}

function mostrarSolicitud(){

    $consultas = new Consultas();

    $filas = $consultas->verSolicitudes();

    foreach($filas as $fila){

        echo '
        
                <tr>
                <td>
                    <figure class="photo">
                        <img src="'.$fila['foto'].'" alt="">
                    </figure>
                    <div class="info">
                        <h3>'.$fila['tipo'].'</h3>                        
                        <p>'.$fila['ciudad'].' / '.$fila['barrio'].'</p>
                        <p>'.$fila['nombres'].'</p>
                    </div>
                    <div class="controls">
                        <a href="InmoShowSolicitud.php?id_inmueble='.$fila['id_sol'].'" class="show"></a>
                    </div>
                </td>
            </tr>
        
               
        ';

    }


}

function mostrarSolicitudInfo(){

    
    $id_sol = $_GET['id_inmueble'];

    $consultas = new Consultas();

    $filas = $consultas->mostrarSolicitudToShow($id_sol);

    foreach($filas as $fila){

        echo '
        
     
                    <figure class="photo-preview">
                    <img src="'.$fila['foto'].'" alt="">
                </figure>
                <div class="cont-details">
                    <div>
                        <article class="info-name">
                            <p>'.$fila['tipo'].'</p>
                        </article>
                        <article class="info-category">
                            <p>'.$fila['categoria'].'</p>
                        </article>
                        <article class="info-precio">
                            <p>$'.$fila['precio'].'</p>
                        </article>
                        <article class="info-direccion">
                            <p>'.$fila['barrio'].'/'.$fila['ciudad'].'</p>
                        </article>
                        <hr>
                        <br>
                        <article class="info-fecha">
                            <p>'.$fila['fecha'].'</p>
                        </article>
                        <article class="info-usuario">
                            <p>'.$fila['nombres'].'</p>
                        </article>
                        <article class="info-telefono">
                            <p>'.$fila['telefono'].'</p>
                        </article>
                        <article class="info-correo">
                            <p>'.$fila['correo'].'</p>
                        </article>
                    </div>
                </div>
                     
        ';



    }

    
}





?>