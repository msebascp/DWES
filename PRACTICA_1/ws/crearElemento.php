<?php
    include './models/Elemento.php';
    $name = $_POST['name'] ?? null;
    $description = $_POST['description'] ?? null;
    $nseries = $_POST['nseries'] ?? null;
    $state = (isset($_POST['state'])) ? $_POST['state'] : "No activo";
    $priority = $_POST['priority'] ?? null;
    $elemento = new Elemento($name, $description, $nseries, $state, $priority);
    $elementoInfo = $elemento->toJson();
    $archivoTexto = fopen('elementoInfo.txt', 'a');
    fputs($archivoTexto, $elementoInfo);
    fclose($archivoTexto);
    echo $elementoInfo;
?>