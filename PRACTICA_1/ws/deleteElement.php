<?php
	require "conexion.php";
	require "obtenerRespuestaFormateada.php";
	$conexion = new Conexion();
	$conexion = $conexion->devolverConexion();
	$id = $_GET['id'] ?? null;
	try {
		$sql = "select * from monfab.elementos where id = $id";
		$sentencia = $conexion->query($sql);
		$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		if (empty($resultado)) {
			$success = false;
			$message = "Elemento con id $id no encontrado";
			$resultado = null;
		} else {
			$sql = "delete from monfab.elementos where id = $id";
			$sentencia2 = $conexion->query($sql);
			$success = true;
			$message = "Elemento con id $id eliminado correctamente";
		}
	} catch (PDOException $e) {
		$success = false;
		$message = 'ERROR Id';
		$resultado = null;
	}
	print (obtenerRespuestaFormateada($success, $message, $resultado));
?>