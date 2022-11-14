<?php
    function obtenerRespuestaFormateada($succes, $message, $data){  
        if(!is_null($data)) {
            for($i = 0; $i < count($data); $i++){
                unset($data[$i]['id']);
            }
        }
        $dataJson = array("success"=>$succes, "message"=>$message, "data"=>$data);
        $dataJson = json_encode($dataJson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        print_r("<pre>");
        print $dataJson;
        print_r("</pre>");
    }
?>