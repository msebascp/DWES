<?php
    require "conexion.php";
    require "obtenerRespuestaFormateada.php";
    $conexion = new Conexion();
    $conexion = $conexion->devolverConexion();
    $id = $_GET['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $description = $_POST['description'] ?? null;
    $nseries = $_POST['nseries'] ?? null;
    $state = $_POST['estate'] ?? 'No activo';
    $priority = $_POST['priority'] ?? null;
    try {
        $sql="select * from monfab.elementos where id = $id";
        $sentencia=$conexion->query($sql);
        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        if(empty($resultado)){
            $succes = false;
            $message = "Elemento con id $id no encontrado";
            $resultado = null;
        }
        else {
            $sql="update monfab.elementos set nombre = \"$name\", descripcion = \"$description\", nserie = \"$nseries\", 
            estado = \"$state\", prioridad = \"$priority\" where id = $id";
            $sentencia2=$conexion->query($sql);
            $succes = true;
            $message = "Elemento con id $id ha sido modificado correctamente";
            $resultado = ["nombre"=>$name, "descripcion"=>$description, "nseries"=>$nseries, "estado"=>$state, "prioridad"=>$priority];
        }
    } catch (PDOException $e) {
        $succes = false;
        $message = 'ERROR Id';
        $resultado = null;
    }
    print obtenerRespuestaFormateada($succes, $message, $resultado);
?>