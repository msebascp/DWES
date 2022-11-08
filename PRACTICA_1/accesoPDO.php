<?php
require "conexion.php";

class accesoPDO extends Conexion{
	
	public function __construct(){
		
		parent::__construct(); //llamamos al constructor de la clase padre
	
		} 
	public function get_productos($datos){
		
		$sql="select * from ARTÍCULOS where PAISDEORIGEN=:datos";
		$sentencia=$this->conexion_db->prepare($sql);
		$sentencia->execute(array(':datos'=>$datos));
		$resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultado;
		$this->conexion_db=null;
		}
	}
?>