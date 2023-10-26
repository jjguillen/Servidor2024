<?php

    include_once("Tarjeta.php");

    class TarjetaCredito extends Tarjeta {

        private $tipoInteres; //10%
        private $deuda=0; 
        
        function __construct($numTarjeta, $saldo, $tipoInteres) {
            parent::__construct($numTarjeta,$saldo);
            $this->tipoInteres = $tipoInteres;
        }

         /**
         * Get the value of tipoInteres
         */ 
        public function getTipoInteres()
        {
                return $this->tipoInteres;
        }

        /**
         * Set the value of tipoInteres
         *
         * @return  self
         */ 
        public function setTipoInteres($tipoInteres)
        {
                $this->tipoInteres = $tipoInteres;

                return $this;
        }

        /**
         * Get the value of deuda
         */ 
        public function getDeuda()
        {
                return $this->deuda;
        }

        function retirar($cantidad) {

            $this->saldo -= $cantidad;

            if ($this->saldo < 0) {
                $this->deuda = - $this->saldo;
            }
        }

        function calcularDeuda() {
            return $this->deuda + ($this->deuda * $this->tipoInteres / 100);
        }

        function cargar($cantidad) {
            parent::cargar($cantidad);

            if ($this->saldo < 0) {
                $this->deuda = - $this->saldo;
            }
        }



       
    }

/*
    $tarjeta = new TarjetaCredito("ES3939393","1000",10);
    $tarjeta->retirar(1100);
    echo $tarjeta->calcularDeuda();
*/
?>