<?php
    include "Car.php";
    include "Config.php";
    include "Persona.php";
    include "Informatico.php";
    include "TecnicoRedes.php";
    $a = new Informatico('alex', 'gracia', '2', '3', 'no', 'si');
    echo $a -> getLenguajes()."<br>";
    Config::showData();
?>