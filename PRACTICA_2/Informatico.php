<?php
    
    class Informatico extends Persona {
        private $lenguajes;
        private $experienciaProgramador;
        //Constructor
        public function __construct($nombre, $apellidos, $altura, $edad, $lenguajes, $experienciaProgramador) {
            parent::__construct($nombre, $apellidos, $altura, $edad);
            $this-> lenguajes = $lenguajes;
            $this-> experienciaProgramador = $experienciaProgramador;
        }
        //Métodos
        public function programar() {
            echo "Estoy programando<br>";
        }
        public function repararOrdenador() {
            echo "Estoy reparando un pc<br>";
        }
        public function hacerOfimatica() {
            echo "Ofimática<br>";
        }
        //Getters and Setters
        public function getLenguajes()
        {
                return $this->lenguajes;
        }
        public function setLenguajes($lenguajes)
        {
                $this->lenguajes = $lenguajes;

                return $this;
        }
        public function getExperienciaProgramador()
        {
                return $this->experienciaProgramador;
        }
        public function setExperienciaProgramador($experienciaProgramador)
        {
                $this->experienciaProgramador = $experienciaProgramador;

                return $this;
        }
    }
?>