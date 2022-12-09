<?php
	require "conexion.php";
	require "obtenerRespuestaFormateada.php";
	$conexion = new Conexion();
	$conexion = $conexion->devolverConexion();
	$name = $_POST['name'] ?? null;
	$description = $_POST['description'] ?? null;
	$nseries = $_POST['nseries'] ?? null;
	$state = $_POST['state'] ?? "No activo";
	$priority = $_POST['priority'] ?? null;
	$success = false;
	$message = 'ERROR. El elemento no se ha creado, algún elemento no está definido';
	$resultado = null;
	//Crear elemento
	if (!empty($name) && !empty($description) && !empty($nseries) && !is_null($priority)) {
		$sql = "insert into elementos set nombre =  \"$name\", descripcion = \"$description\", 
        nserie = \"$nseries\", estado = \"$state\", prioridad = \"$priority\"";
		try {
			$sentencia = $conexion->query($sql);
			$lastId = $conexion->lastInsertId();
			$success = true;
			$message = "Elemento con id $lastId creado correctamente";
			$resultado = ["nombre" => $name, "descripcion" => $description, "nseries" => $nseries, "estado" => $state, "prioridad" => $priority];
		} catch (PDOException $e) {
			echo 'Error: ' . $e;
		}
	}
	print obtenerRespuestaFormateada($success, $message, $resultado);
?>