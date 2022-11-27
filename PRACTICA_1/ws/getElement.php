<?php
    require "conexion.php";
    require "obtenerRespuestaFormateada.php";
    $conexion = new Conexion();
    $conexion = $conexion->devolverConexion();
    $id = $_GET['id'] ?? null;
    if(!is_null($id)) {
        $sql="select * from monfab.elementos where id = $id";
        try {
            $sentencia=$conexion->query($sql);
            $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            if(empty($resultado)){
                $success = false;
                $message = "Elemento con id $id no encontrado";
                $resultado = null;
            }
            else {
                $success = true;
                $message = "Elemento con id $id obtenido correctamente";
            }
        } catch (PDOException $e) {
            $success = false;
            $message = "ERROR id";
            $resultado = null;
        }
    }
    else {
        $sql = "select * from monfab.elementos";
        $sentencia = $conexion->query($sql);
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $success = true;
        $message = 'Elementos obtenidos correctamente';
    }
    print (obtenerRespuestaFormateada($success, $message, $resultado));
?>