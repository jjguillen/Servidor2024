<?php

    namespace DeepRacer\controladores;

    use DeepRacer\vistas\VistaInicio;
    use DeepRacer\modelos\ModeloResultados;
    use DeepRacer\vistas\VistaResultados;

    class ControladorDeepRacer {

        /**
         * Método que muestra la página principal de bienvenida
         */
        public static function mostrarInicio() {
            VistaInicio::render();
        }


        /**
         * Método que muestra todos los resultados
         */
        public static function mostrarTodos() {
            //LLamar a BBDD para traerme todos los resultados
            $resultados = ModeloResultados::mostrarTodos();

            //LLamar a una vista para pintar todos los resultados
            VistaResultados::render($resultados);
        }

        /**
         * Método que eliminar un resultado de la BBDD
         */
        public static function eliminarResultado($id) {
            ModeloResultados::eliminarResultado($id);

            $resultados = ModeloResultados::mostrarTodos();
            VistaResultados::render($resultados);
        }



    }



?>