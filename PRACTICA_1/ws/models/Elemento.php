<?php
    include('./interfaces/iToJson.php');
    class Elemento implements iToJson{
        private $name;
        private $description;
        private $nseries;
        private $state;
        private $priority;
        //Constructor
        public function __construct($name, $description, $seriesNumber, 
        $state, $priority) {
            $this->name = $name;
            $this->description = $description;
            $this->nseries = $seriesNumber;
            $this->state = $state;
            $this->priority = $priority;
        }
        //Métodos
        public function toJson() {
            $elementoInfo = '{"Nombre" : "'.$this->name.
                '", "Descripcion" : "'.$this->description.
                '", "Numero de serie" : "'.$this->nseries.
                '", "Estado" : "'.$this->state.
                '", "Prioridad" : "'.$this->priority.'"}';
            return $elementoInfo;
        }
        //Crear metodo save(), getAll()--devuelve todos los elementos
        //Getters and Setters
        public function getName()
        {
                return $this->name;
        }
        public function setName($name)
        {
                $this->name = $name;
        }
        public function getDescription()
        {
                return $this->description;
        } 
        public function setDescription($description)
        {
                $this->description = $description;
        } 
        public function getNseries()
        {
                return $this->nseries;
        }
        public function setNseries($nseries)
        {
                $this->nseries = $nseries;
        }
        public function getState()
        {
                return $this->state;
        }
        public function setState($state)
        {
                $this->state = $state;
        }
        public function getPriority()
        {
                return $this->priority;
        }
        public function setPriority($priority)
        {
                $this->priority = $priority;
        }
    }
?>