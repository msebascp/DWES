<?php
    function obtenerRespuestaFormateada($success, $message, $data):string
    {
        $dataJson = ["success"=>$success, "message"=>$message, "data"=>$data];
        $dataJson = json_encode($dataJson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return($dataJson);
    }
?>