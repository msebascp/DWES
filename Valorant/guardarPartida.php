<?php
//Recoge los datos que envian a la pagina php por el cuerpo de la peticion
$datos = file_get_contents('php://input');
var_dump($datos);
//String en formato json y se traduce para trabajar en php
$datos = json_decode($datos, false);
echo 'El nombre del heroe era ' . $datos->heroName;
?>