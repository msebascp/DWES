<?php
    
    class TecnicoRedes extends Informatico {
        private $caracteristicas;
        private $auditarRedesExpienciaredes;
        //Constructor
        public function __construct($nombre, $apellidos, $altura, $edad, $lenguajes, $experienciaProgramador, $caracteristicas,
        $auditarRedesExpienciaredes) {
            parent::__construct($nombre, $apellidos, $altura, $edad, $lenguajes, $experienciaProgramador);
            $this-> caracteristicas = $caracteristicas;
            $this-> auditarRedesExpienciaredes = $auditarRedesExpienciaredes;
        }
        //Métodos
        public function auditarRedes() {
            echo "Auditar redes<br>";
        }
        //Getters and Setters
        public function getCaracteristicas()
        {
                return $this->caracteristicas;
        }
        public function setCaracteristicas($caracteristicas)
        {
                $this->caracteristicas = $caracteristicas;

                return $this;
        }
        public function getAuditarRedesExpienciaredes()
        {
                return $this->auditarRedesExpienciaredes;
        }
        public function setAuditarRedesExpienciaredes($auditarRedesExpienciaredes)
        {
                $this->auditarRedesExpienciaredes = $auditarRedesExpienciaredes;

                return $this;
        }
    }
?>