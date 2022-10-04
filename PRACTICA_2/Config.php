<?php
    class Config {
        private static $color = "Negro";
        private static $newsletter = "Sí";
        private static $entorno = ":)";
        //Métodos
        public static function showData() {
                echo self::$color."<br>";
                echo self::$newsletter."<br>";
                echo self::$entorno."<br>";
        }
    }
    /*¿Cómo hacemos referencia a esta clase?
    ¿Debemos instanciarla?
    No es necesario instanciarla, puedes llamar directamente a la clase, por ejemplo:
    Config::shoowData();
    En este caso llamaríamos a la función estática showData() de Config
    */
?>