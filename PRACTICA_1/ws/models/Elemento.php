<?php
        //include("iToJson.php");
    class Elemento {
        private $name;
        private $description;
        private $seriesNumber;
        private $state;
        private $priority;
        //Constructor
        public function __construct($name, $description, $seriesNumber, 
        $state, $priority) {
            $this-> name = $name;
            $this-> description = $description;
            $this-> seriesNumber = $seriesNumber;
            $this-> state = $state;
            $this-> priority = $priority;
        }
        //Métodos
        /*
        public function toJson() {

        }
        */
        //Getters and Setters
        public function getName()
        {
                return $this->name;
        }
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
        public function getDescription()
        {
                return $this->description;
        } 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        } 
        public function getSeriesNumber()
        {
                return $this->seriesNumber;
        }
        public function setSeriesNumber($seriesNumber)
        {
                $this->seriesNumber = $seriesNumber;

                return $this;
        }
        public function getState()
        {
                return $this->state;
        }
        public function setState($state)
        {
                $this->state = $state;

                return $this;
        }
        public function getPriority()
        {
                return $this->priority;
        }
        public function setPriority($priority)
        {
                $this->priority = $priority;

                return $this;
        }
    }
?>