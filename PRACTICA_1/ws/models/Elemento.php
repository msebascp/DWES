<?php
    include('../interfaces/iToJson.php');
    class Elemento implements iToJson{
        private string $name;
        private string $description;
        private string $nseries;
        private string $state;
        private string $priority;
        //Constructor
        public function __construct($name, $description, $nseries,
                                    $state, $priority) {
            $this->name = $name;
            $this->description = $description;
            $this->nseries = $nseries;
            $this->state = $state;
            $this->priority = $priority;
        }
        //Métodos
        public function toJson(): string
        {
            return '{"Nombre" : "'.$this->name.
                '", "Descripcion" : "'.$this->description.
                '", "Numero de serie" : "'.$this->nseries.
                '", "Estado" : "'.$this->state.
                '", "Prioridad" : "'.$this->priority.'"}';
        }
        //Crear método save(), getAll()--devuelve todos los elementos
        //Getters and Setters
        public function getName(): string
        {
                return $this->name;
        }
        public function setName($name)
        {
                $this->name = $name;
        }
        public function getDescription(): string
        {
                return $this->description;
        } 
        public function setDescription($description)
        {
                $this->description = $description;
        } 
        public function getNseries(): string
        {
                return $this->nseries;
        }
        public function setNseries($nseries)
        {
                $this->nseries = $nseries;
        }
        public function getState(): string
        {
                return $this->state;
        }
        public function setState($state)
        {
                $this->state = $state;
        }
        public function getPriority(): string
        {
                return $this->priority;
        }
        public function setPriority($priority)
        {
                $this->priority = $priority;
        }
    }
?>