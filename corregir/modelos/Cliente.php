<?php 

    namespace Incidencias\modelos;

    class Cliente {
        private $id;
        private $nombre;
        private $direccion;
        private $localidad;
        private $movil;
        private $dni;
        private $email;

        public function __construct($id="", $nombre="", $direccion="", $localidad="", $email="", $movil="", $dni="") {
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> direccion = $direccion;
            $this -> localidad = $localidad; 
            $this -> email = $email;
            $this -> movil = $movil;
            $this -> dni = $dni;
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of direccion
         */ 
        public function getDireccion()
        {
                return $this->direccion;
        }

        /**
         * Set the value of direccion
         *
         * @return  self
         */ 
        public function setDireccion($direccion)
        {
                $this->direccion = $direccion;

                return $this;
        }

        /**
         * Get the value of localidad
         */ 
        public function getLocalidad()
        {
                return $this->localidad;
        }

        /**
         * Set the value of localidad
         *
         * @return  self
         */ 
        public function setLocalidad($localidad)
        {
                $this->localidad = $localidad;

                return $this;
        }

        /**
         * Get the value of movil
         */ 
        public function getMovil()
        {
                return $this->movil;
        }

        /**
         * Set the value of movil
         *
         * @return  self
         */ 
        public function setMovil($movil)
        {
                $this->movil = $movil;

                return $this;
        }

        /**
         * Get the value of dni
         */ 
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         *
         * @return  self
         */ 
        public function setDni($dni)
        {
                $this->dni = $dni;

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
    }



?>