<?php

require("config.php");
Class Conexion{
	protected $conexion_db;
	public function __construct(){
		
		try{
			//se crea el objeto de tipo conexión
			$this->conexion_db=new PDO('mysql:host=localhost; dbname=prueba','root','');
			$this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conexion_db->exec("SET CHARACTER SET utf8");
			return $this->conexion_db;
            
			}catch(Exception $e){
				
				echo "la linea de error es: " . $e->getline();
				
				}
			
		}
/*		public function get_productos($datos){
		
		$sql="select * from ARTÍCULOS where PAISDEORIGEN=:datos";
		$sentencia=$this->conexion_db->prepare($sql);
		$sentencia->execute(array(':datos'=>$datos));
		$resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultado;
		$this->conexion_db=null;
		
		}*/
}
?>