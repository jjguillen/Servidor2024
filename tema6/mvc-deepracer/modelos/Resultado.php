<?php
    namespace DeepRacer\modelos;

    class Resultado {

        private $id;
        private $modelo;
        private $pista;
        private $tiempo;
        private $colisiones;

        public function __construct($id="",$modelo="",$pista="",$tiempo="",$colisiones="")
        {
            $this->id = $id;
            $this->modelo = $modelo;
            $this->pista = $pista;
            $this->tiempo = $tiempo;
            $this->colisiones = $colisiones;
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
         * Get the value of tiempo
         */ 
        public function getTiempo()
        {
                return $this->tiempo;
        }

        /**
         * Set the value of tiempo
         *
         * @return  self
         */ 
        public function setTiempo($tiempo)
        {
                $this->tiempo = $tiempo;

                return $this;
        }

        

        /**
         * Get the value of colisiones
         */ 
        public function getColisiones()
        {
                return $this->colisiones;
        }

        /**
         * Set the value of colisiones
         *
         * @return  self
         */ 
        public function setColisiones($colisiones)
        {
                $this->colisiones = $colisiones;

                return $this;
        }
    }