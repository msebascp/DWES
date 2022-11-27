<?php
    require("config.php");
    Class Conexion{
        public function devolverConexion(): PDO|string
        {
            $conexionString = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME;
            try{ 
                //se crea el objeto de tipo conexión
                $conexion_db=new PDO($conexionString,DB_USER,DB_PASS);
                $conexion_db->exec("SET CHARACTER SET ".DB_CHARSET);
                $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                return $conexion_db;
            }catch(Exception $e){
                $conexion_db = 'ERROR';
                echo "la linea de error es: " . $e->getline();
                return $conexion_db;
            }	
        }
    }
?>