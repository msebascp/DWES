<?php
    require "conexion.php";
    require "obtenerRespuestaFormateada.php";
    $conexion = new Conexion();
    $conexion = $conexion->devolverConexion();
    $id = $_GET['id'] ?? null;
    if(isset($id) && !empty($id) && !empty(trim($id))) {
        $sql="select * from monfab.elementos where id = $id";
        $sentencia=$conexion->query($sql);
        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        if(empty($resultado)){
            $succes = false;
            $message = "Elemento con id $id no encontrado";
            $resultado = null;
        }
        else {
            $succes = true;
            $message = "Elemento con id $id obtenido correctamente";
        }
    }
    else {
        $sql = "select * from monfab.elementos";
        $sentencia = $conexion->query($sql);
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $succes = true;
        $message = 'Elementos obtenidos correctamente';
    }
    obtenerRespuestaFormateada($succes, $message, $resultado);
?>