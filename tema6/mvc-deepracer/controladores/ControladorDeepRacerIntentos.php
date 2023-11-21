<?php

    namespace DeepRacer\controladores;

    use DeepRacer\modelos\ModeloIntentos;
    use DeepRacer\modelos\Intento;
    use DeepRacer\vistas\VistaIntentos;
    use DeepRacer\vistas\VistaIntentosForm;


    class ControladorDeepRacerIntentos {

        public static function verIntentos($idResultado) {

            $intentos = ModeloIntentos::mostrarIntentos($idResultado);
            VistaIntentos::render($intentos, $idResultado);
        }

        public static function eliminarIntento($id, $idResultado) {
            ModeloIntentos::eliminarIntento($id);
            
            $intentos = ModeloIntentos::mostrarIntentos($idResultado);
            VistaIntentos::render($intentos, $idResultado);
        }

        public static function mostrarFormNuevoIntento($idResultado) {
            VistaIntentosForm::render($idResultado);
        }

        public static function insertarNuevoIntento($intento, $idResultado) {
            ModeloIntentos::insertarIntento($intento, $idResultado);

            $intentos = ModeloIntentos::mostrarIntentos($idResultado);
            VistaIntentos::render($intentos, $idResultado);
        }


    }