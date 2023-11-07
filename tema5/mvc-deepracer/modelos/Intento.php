<?php

namespace DeepRacer\modelos;

    class Intento {

        private $id;
        private $nombre;
        private $pista;
        private $tiempo;
        private $colisiones;

        public function __construct($id="", $nombre="", $pista="", $tiempo="", $colisiones="") {

            $this->id = $id;
            $this->nombre = $nombre;
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
?>