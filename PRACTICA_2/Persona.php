<?php
    class Persona {
        private $nombre;
        private $apellidos;
        private $altura;
        private $edad;
        //Constructor
        public function __construct($nombre, $apellidos, $altura, $edad){
            $this-> nombre = $nombre;
            $this-> apellidos = $apellidos;
            $this-> altura = $altura;
            $this-> edad = $edad;
        }
        //Métodos
        public function hablar() {
            echo "Hola<br>";
        }
        public function caminar() {
            echo "Estoy caminando<br>";
        }
        //Getters and Setters
        public function getNombre()
        {
                return $this->nombre;
        }
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }
        public function getApellidos()
        {
                return $this->apellidos;
        }
        public function setApellidos($apellidos)
        {
                $this->apellidos = $apellidos;

                return $this;
        }
        public function getAltura()
        {
                return $this->altura;
        }
        public function setAltura($altura)
        {
                $this->altura = $altura;

                return $this;
        }
        public function getEdad()
        {
                return $this->edad;
        }
        public function setEdad($edad)
        {
                $this->edad = $edad;

                return $this;
        }
    }
?>