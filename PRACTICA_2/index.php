<?php
    include "Car.php";
    include "Config.php";
    include "Persona.php";
    include "Informatico.php";
    include "TecnicoRedes.php";
    echo "Creando coche: Car('Rojo', 'Renault', 'A' , '10' , '90' , '5')<br>";
    $nuevoCoche = new Car('Rojo', 'Renault', 'A' , '10' , '90' , '5');
    echo "Mostrando datos:<br>";
    $nuevoCoche -> showCar();
    echo "Cambiando a negro el color<br>";
    $nuevoCoche -> setColor('negro');
    echo "Mostrando datos:<br>";
    $nuevoCoche -> showCar();
    echo "Creando tecnico de redes: TecnicoRedes('alex', 'gracia', '2 metros', '3o años', 
    'Mis lenguajes', 'Mi experiencia', 'Mis caracteristicas', 'Audito redes')<br>";
    $usuarioPrueba = new TecnicoRedes('alex', 'gracia', '2 metros', '3o años', 'Mis lenguajes', 
    'Mi experiencia', 'Mis caracteristicas', 'Audito redes');
    echo "Metodo único de técnico de redes:<br>";
    $usuarioPrueba -> auditarRedes();
    echo "Metodo hablar de abuelo:<br>";
    $usuarioPrueba -> hablar();
?>