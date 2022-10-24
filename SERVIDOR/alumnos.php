<?php
    //Devuelve todos los alumnos de la base de datos
    //1.Conectarse a la base datos 
    $direccion = '127.0.0.1';
    $usuario = 'root';
    $password = '';
    $baseDatos = 'colegio';
    //DSN -> DATA SOURCE NAME
    //driver:host=host;dbname=baseDatos
    $dsn = "mysql:host=$direccion;dbname=$baseDatos";
    try {
        //Creamos la conexion
        $pdo = new PDO($dsn, $usuario, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $nombre = $_GET['nombre'];
        echo "el nombre es $nombre\n\n";
        $consulta = $pdo->prepare("SELECT * FROM alumno WHERE nombre = :nombre");
        $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        //ejecutaConsulta($pdo, "SELECT * FROM alumno WHERE nombre = :nombre");
        ejecutaConsulta($pdo, "SELECT * FROM alumno");
        ejecutaConsulta($pdo, "SELECT * FROM asignatura");
    } catch(PDOException $e) {
        echo '¿Le has dado start en el Xamp?';
    }
    function ejecutaConsulta($pdo, $consultaEjecutar) {
        try {
            $consulta = $pdo->query($consultaEjecutar);
            var_dump(value:$consulta);
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if(empty($resultados)){
                echo "No hay resultados";
            }
            else{
                //3.Devolver los resultados
                print_r($resultados);
            }
        }catch(Exception $e) {
            echo "Error en $consultaEjecutar";
        }
    }
?>