<?php

    include("TarjetaCredito.php");
    include("TarjetaDebito.php");


    class Banco {

        private $nombre;
        private $tarjetas;

        function __construct($nombre) {
            $this->nombre = $nombre;
            $this->tarjetas = array();
        }

        public function mostrar() {
            foreach($this->tarjetas as $tarjeta) {
                echo "<br>".$tarjeta->getNumTarjeta()." | ".$tarjeta->getSaldo()." | ".$tarjeta->calcularDeuda();
            }
        }

        public function addTarjeta(Tarjeta $tarjeta) {
            array_push($this->tarjetas,$tarjeta);
        }

    }


    $banco = new Banco("BBVB");

    $banco->addTarjeta(new TarjetaDebito("B00001", 1000, 300));

    $tc = new TarjetaCredito("B00002", 100, 15);
    $tc->retirar(200);

    $banco->addTarjeta($tc);

    $banco->mostrar();

?>