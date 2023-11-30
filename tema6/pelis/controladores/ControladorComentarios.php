<?php

    namespace Comentarios\controladores;
    use Comentarios\vistas\VistaAPIDetallePelis;
    use Comentarios\vistas\VistaInicio;
    use Comentarios\modelos\ModeloComentarios;

    class ControladorComentarios {

        public static function mostrarInicio() {

            VistaInicio::render();
        }

        public static function mostrarComentarios($respObj) {
            //Llamar al modelo para que me de los comentarios de la peli
            $idPeli = $respObj->id;
            $comentarios  = ModeloComentarios::getComentarios($idPeli);
            
            VistaAPIDetallePelis::render($respObj, $comentarios);
            
        }

        public static function nuevoComentario($comentObj) {
            ModeloComentarios::nuevoComentario($comentObj);

        }





    }



?>