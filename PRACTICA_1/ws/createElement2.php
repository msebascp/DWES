<?php
    //opcion 1
    $todo = $_POST['todo'];
    $pdo = new PDO();
    $consulta = $pdo->execute('insert into tal values: ');

    //opcion 2
    $todo = $POST['todo'];
    $elemento = new Elemento($todo);
    guardarElemento($elemento);
?>