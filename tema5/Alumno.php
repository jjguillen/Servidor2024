<?php

    include("Persona.php");

    class Alumno extends Persona {

        private $centro;
        private $email;

        function __construct($nombre, $edad, $centro, $email) {
            parent::__construct($nombre, $edad);
            $this->centro = $centro;
            $this->email = $email;
        }

        /**
         * Get the value of centro
         */ 
        public function getCentro()
        {
                return $this->centro;
        }

        /**
         * Set the value of centro
         *
         * @return  self
         */ 
        public function setCentro($centro)
        {
                $this->centro = $centro;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function pintarHTML() {
            parent::pintarHTML();
            echo "<p>Centro: ".$this->centro."<p>";
            echo "<p>Email: ".$this->email."<p>";
            
        }
    }

    $fran = new Alumno("Fran", 22, "Jaroso", "fran@gmail.com");
    $fran->pintarHTML();

?>
