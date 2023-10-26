<?php

    abstract class Tarjeta {

        protected $numTarjeta;
        protected $saldo;

        function __construct($numTarjeta, $saldo) {
            $this->numTarjeta = $numTarjeta;
            $this->saldo = $saldo;
        }


        /**
         * Get the value of numTarjeta
         */ 
        public function getNumTarjeta()
        {
                return $this->numTarjeta;
        }

        /**
         * Set the value of numTarjeta
         *
         * @return  self
         */ 
        public function setNumTarjeta($numTarjeta)
        {
                $this->numTarjeta = $numTarjeta;

                return $this;
        }

        /**
         * Get the value of saldo
         */ 
        public function getSaldo()
        {
                return $this->saldo;
        }

        /**
         * Set the value of saldo
         *
         * @return  self
         */ 
        public function setSaldo($saldo)
        {
                $this->saldo = $saldo;

                return $this;
        }

        public abstract function retirar($cantidad);
        
        public function cargar($cantidad) {
            $this->saldo += $cantidad;
        }

        public function calcularDeuda() {
            return 0;
        }

    }


?>