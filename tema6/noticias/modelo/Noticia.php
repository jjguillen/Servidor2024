<?php

    class Noticia {

        private $id;
        private $encabezado;
        private $texto;
        private $fecha;

        //Creamos el constructor con todos los parámetros con valor por defecto
        public function __construct($id="",$encabezado="",$texto="",$fecha="") {
            $this->id = $id;
            $this->encabezado = $encabezado;
            $this->texto = $texto;
            $this->fecha = $fecha;
        }


        /**
         * Get the value of encabezado
         */ 
        public function getEncabezado()
        {
                return $this->encabezado;
        }

        /**
         * Set the value of encabezado
         *
         * @return  self
         */ 
        public function setEncabezado($encabezado)
        {
                $this->encabezado = $encabezado;

                return $this;
        }

        /**
         * Get the value of texto
         */ 
        public function getTexto()
        {
                return $this->texto;
        }

        /**
         * Set the value of texto
         *
         * @return  self
         */ 
        public function setTexto($texto)
        {
                $this->texto = $texto;

                return $this;
        }

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        public function __toString() {
            $cadena = "";
            $cadena .= "NOTICIA: ".$this->encabezado."<br>";
            $cadena .= $this->texto."<br>";
            $cadena .= $this->fecha."<br>";
            return $cadena;
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        //Se ejecuta automáticamente cuando accedo a una propiedad que no existe o no tengo permiso de un objeto
        public function __set($name, $value) {
                echo "Donde vas";
        }
    }





?>