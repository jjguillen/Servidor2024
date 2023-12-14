<?php

    namespace Examen\controladores;
    use Examen\vistas\VistaAI;
    use Examen\modelos\ModeloAI;
    use Examen\vistas\VistaAIDetalle;

    class ControladorAI {

        public static function mostrarInicio() {

            //Llamar la modelo para traerme los regalos
            $regalos = ModeloAI::mostrarAIs();

            //var_dump($regalos);
            //Pasar los regalos a la vista
            VistaAI::render($regalos);
        }

        public static function delAI($id) {

            //Eliminar regalo
            $regalos = ModeloAI::delAI($id);

            $regalos = ModeloAI::mostrarAIs();
            VistaAI::render($regalos);
        }

        public static function addAI($amigoI) {
            //Llamar api para emoji
            $uri = "https://emojihub.yurace.pro/api/random";       
            $reqPrefs['http']['method'] = 'GET';
            $reqPrefs['http']['header'] = 'X-Auth-Token: ';
            $stream_context = stream_context_create($reqPrefs);
            $resultado = file_get_contents($uri, false, $stream_context);
        
            $emoji = ";)";
            if ($resultado != false) {
                $respPHP = json_decode($resultado);
                $emoji = $respPHP->htmlCode[0];
            }

            $amigoI->setEmoji($emoji);

            //Añadir regalo
            ModeloAI::addAI($amigoI);

            $regalos = ModeloAI::mostrarAIs();
            VistaAI::render($regalos);
        }
        
        public static function verParticipantes($id) {
            //Datos del regalo
            $regalo = ModeloAI::getRegalo($id);

            //Datos de los participantes
            $participantes = ModeloAI::getParticipantes($id);
            
            //Pintarlo
            VistaAIDetalle::render($regalo, $participantes);
        }

        public static function deleteParticipante($idP, $idAI) {
            //Borrar participante
            ModeloAI::deleteParticipante($idP, $idAI);

            ControladorAI::verParticipantes($idAI);

        }

        public static function addParticipante($participante, $idAI) {
            //Añadir participante
            ModeloAI::addParticipante($participante, $idAI);

            ControladorAI::verParticipantes($idAI);
        }


    }



?>