<?php

    class Favorito {

        private $id;
        private $titulo;
        private $imagen;
        private $autor;
        private $readLink;

        public function __construct($id="",$titulo="",$imagen="",$autor="",$readLink="") {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->imagen = $imagen;
            $this->autor = $autor;
            $this->readLink = $readLink;
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
         * Get the value of titulo
         */ 
        public function getTitulo()
        {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo)
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of autor
         */ 
        public function getAutor()
        {
                return $this->autor;
        }

        /**
         * Set the value of autor
         *
         * @return  self
         */ 
        public function setAutor($autor)
        {
                $this->autor = $autor;

                return $this;
        }

        /**
         * Get the value of readLink
         */ 
        public function getReadLink()
        {
                return $this->readLink;
        }

        /**
         * Set the value of readLink
         *
         * @return  self
         */ 
        public function setReadLink($readLink)
        {
                $this->readLink = $readLink;

                return $this;
        }
    }