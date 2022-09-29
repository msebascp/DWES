<?php
    class Car {
        private $color;
        private $marca;
        private $modelo;
        private $velocidad;
        private $caballaje;
        private $plazas;
        //Constructor
        public function __construct($color, $marca, $modelo, $velocidad, $caballaje, $plazas){
                $this-> color = $color;
                $this-> marca = $marca;
                $this-> modelo = $modelo;
                $this-> velocidad = $velocidad;
                $this-> caballaje = $caballaje;
                $this-> plazas = $plazas; 
        }
        //Métodos
        public function acelerar(){
            $this-> $velocidad++;
        }     
        public function showCar(){
                echo "Información del coche:<br>";
                echo "Color: ".$this-> color."<br>";
                echo "Marca: ".$this-> marca."<br>";
                echo "Modelo: ".$this-> modelo."<br>"; 
                echo "Velocidad: ".$this-> velocidad."<br>"; 
                echo "Caballaje: ".$this-> caballaje."<br>";
                echo "Plazas: ".$this-> plazas;
        }
        //Getters y Setters
        public function getColor()
        {
                return $this->color;
        }
        public function setColor($color)
        {
                $this->color = $color;

                return $this;
        }
        public function getMarca()
        {
                return $this->marca;
        }
        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }
        public function getModelo()
        {
                return $this->modelo;
        }
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }
        public function getVelocidad()
        {
                return $this->velocidad;
        }
        public function setVelocidad($velocidad)
        {
                $this->velocidad = $velocidad;

                return $this;
        }
        public function getCaballaje()
        {
                return $this->caballaje;
        }
        public function setCaballaje($caballaje)
        {
                $this->caballaje = $caballaje;

                return $this;
        }
        public function getPlazas()
        {
                return $this->plazas;
        } 
        public function setPlazas($plazas)
        {
                $this->plazas = $plazas;

                return $this;
        }
    }
    $nuevoCoche = new Car('Rojo', 'Renault', 'A' , '10' , '90' , '5');
    $nuevoCoche -> showCar();
?>