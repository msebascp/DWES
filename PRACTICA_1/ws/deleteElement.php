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
            $sql="delete from monfab.elementos where id = $id";
            $sentencia2=$conexion->query($sql);
            $succes = true;
            $message = "Elemento con id $id eliminado correctamente";
        }
    }
    else {
        $succes = false;
        $message = 'ERROR Id';
        $resultado = null;
    }
    obtenerRespuestaFormateada($succes, $message, $resultado);
?>