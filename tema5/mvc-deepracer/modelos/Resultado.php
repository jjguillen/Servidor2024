<?php
    namespace DeepRacer\modelos;

    class Resultado {

        private $id;
        private $modelo;
        private $pista;
        private $tiempoVuelta;
        private $numeroColisiones;

        public function __construct($id="",$modelo="",$pista="",$tiempoVuelta="",$numeroColisiones="")
        {
            $this->id = $id;
            $this->modelo = $modelo;
            $this->pista = $pista;
            $this->tiempoVuelta = $tiempoVuelta;
            $this->numeroColisiones = $numeroColisiones;
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        

        /**
         * Get the value of modelo
         */ 
        public function getModelo()
        {
                return $this->modelo;
        }

        /**
         * Set the value of modelo
         *
         * @return  self
         */ 
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }

        /**
         * Get the value of pista
         */ 
        public function getPista()
        {
                return $this->pista;
        }

        /**
         * Set the value of pista
         *
         * @return  self
         */ 
        public function setPista($pista)
        {
                $this->pista = $pista;

                return $this;
        }

        /**
         * Get the value of tiempoVuelta
         */ 
        public function getTiempoVuelta()
        {
                return $this->tiempoVuelta;
        }

        /**
         * Set the value of tiempoVuelta
         *
         * @return  self
         */ 
        public function setTiempoVuelta($tiempoVuelta)
        {
                $this->tiempoVuelta = $tiempoVuelta;

                return $this;
        }

        /**
         * Get the value of numeroColisiones
         */ 
        public function getNumeroColisiones()
        {
                return $this->numeroColisiones;
        }

        /**
         * Set the value of numeroColisiones
         *
         * @return  self
         */ 
        public function setNumeroColisiones($numeroColisiones)
        {
                $this->numeroColisiones = $numeroColisiones;

                return $this;
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
    }