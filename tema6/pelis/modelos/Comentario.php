<?php
    namespace Comentarios\modelos;

    class Comentario {

        private $id;
        private $idPeli;
        private $nick;
        private $comentario;
        private $nota;

        public function __construct($id="", $idPeli="", $nick="", $comentario="", $nota="") {
            $this->id = $id;
            $this->idPeli = $idPeli;
            $this->nick = $nick;
            $this->comentario = $comentario;
            $this->nota = $nota;
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
         * Get the value of idPeli
         */ 
        public function getIdPeli()
        {
                return $this->idPeli;
        }

        /**
         * Set the value of idPeli
         *
         * @return  self
         */ 
        public function setIdPeli($idPeli)
        {
                $this->idPeli = $idPeli;

                return $this;
        }

        /**
         * Get the value of nick
         */ 
        public function getNick()
        {
                return $this->nick;
        }

        /**
         * Set the value of nick
         *
         * @return  self
         */ 
        public function setNick($nick)
        {
                $this->nick = $nick;

                return $this;
        }

        /**
         * Get the value of comentario
         */ 
        public function getComentario()
        {
                return $this->comentario;
        }

        /**
         * Set the value of comentario
         *
         * @return  self
         */ 
        public function setComentario($comentario)
        {
                $this->comentario = $comentario;

                return $this;
        }

        /**
         * Get the value of nota
         */ 
        public function getNota()
        {
                return $this->nota;
        }

        /**
         * Set the value of nota
         *
         * @return  self
         */ 
        public function setNota($nota)
        {
                $this->nota = $nota;

                return $this;
        }
    }

?>