<?php
    include './models/Elemento.php';
    $name = $_POST['name'];
    $description = $_POST['description'];
    $seriesNumber = $_POST['seriesNumber'];
    $priority = $_POST['priority'];
    $state = (isset($_POST['state'])) ? $_POST['state'] : "No activo";
    $elemento = new Elemento($name, $description, $seriesNumber, $state, $priority);
    $elementoInfo = $elemento->toJson();
    $archivoTexto = fopen('elementoInfo.txt', 'a');
    fputs($archivoTexto, $elementoInfo);
    fclose($archivoTexto);
    echo $elementoInfo;
?>