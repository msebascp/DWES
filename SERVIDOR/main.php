<?php
    require_once('Database.php');
    try {
        $database = new Database('root', '', '127.0.0.1', '3306', 'colegio');
        $nombre = $_GET['nombre'] ?? null;
        $consulta = 'SELECT * FROM alumno';
        if($nombre !== null) {
            $consulta .= " WHERE nombre LIKE '%$nombre%'";
        }
        $alumnos = $database->query($consulta);
        //empty comprueba 0, false, [] o null
        if(empty($alumnos)) {
            echo "Ocurrió un error o no hay resultados";
        }
        else{
            print_r($alumnos);
        }
    } catch(Exception $e) {
        echo "Ha fallado la conexión" . $e->getMessage();
    }
?>