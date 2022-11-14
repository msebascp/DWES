<?php
    require "conexion.php";
    require "obtenerRespuestaFormateada.php";
    $conexion = new Conexion();
    $conexion = $conexion->devolverConexion();
    $name = $_POST['name'] ?? null;
    $description = $_POST['description'] ?? null;
    $nseries = $_POST['nseries'] ?? null;
    $state = $_POST['state'] ?? "No activo";
    $priority = $_POST['priority'] ?? null;
    if(!is_null($name) && !is_null($description) && !is_null($nseries) && !is_null($state) && !is_null($priority)) {
        $sql = "insert into elementos set nombre =  \"$name\", descripcion = \"$description\", nserie = \"$nseries\", estado = \"$state\", prioridad = \"$priority\"";
        $sentencia = $conexion->query($sql);
        $lastId = $conexion->lastInsertId();
        $succes = true;
        $message = "Elemento con id $lastId creado correctamente";
        $resultado=array("nombre"=>$name, "descripcion"=>$description, "nserie"=>$nseries, "estado"=>$state, "prioridad"=>$priority);
    }
    else {
        $succes = false;
        $message = 'ERROR parámetros';
        $resultado = null;
    }
    obtenerRespuestaFormateada($succes, $message, $resultado);
?>