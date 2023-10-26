<?php

    function carga($clase) {
        include_once($clase.".php");
    }
    spl_autoload_register("carga");

    class TarjetaDebito extends Tarjeta {

        private $limite;

        function __construct($numTarjeta, $saldo, $limite) {
            parent::__construct($numTarjeta, $saldo);
            $this->limite = $limite;
        }


        function retirar($cantidad) {

            if ( ($cantidad < $this->limite) && ($this->saldo - $cantidad >= 0) ) {
                $this->saldo -= $cantidad;
            }

        }


        /**
         * Get the value of limite
         */ 
        public function getLimite()
        {
                return $this->limite;
        }

        /**
         * Set the value of limite
         *
         * @return  self
         */ 
        public function setLimite($limite)
        {
                $this->limite = $limite;

                return $this;
        }
    }

?>