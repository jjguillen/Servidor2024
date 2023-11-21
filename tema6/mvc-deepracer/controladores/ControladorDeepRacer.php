<?php

    namespace DeepRacer\controladores;

    use DeepRacer\vistas\VistaInicio;
    use DeepRacer\modelos\ModeloResultados;
    use DeepRacer\vistas\VistaResultados;
    use DeepRacer\vistas\VistaResultadosForm;
    use DeepRacer\vistas\VistaResultadosFormUpdate;

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

        /**
         * Método que muestra el formulario para insertar un nuevo resultado
         */
        public static function mostrarFormNuevoResultado() {
            VistaResultadosForm::render();
        }

        /**
         * Método que inserta en BBDD un objeto Resultado
         */
        public static function insertarNuevoResultado($resultado) {
            ModeloResultados::insertar($resultado);

            $resultados = ModeloResultados::mostrarTodos();
            VistaResultados::render($resultados);
        }

        /**
         * Método que muestra una vista con el formulario para modificar un resultado
         */
        public static function mostrarFormModificarResultado($id) {
            $resultado = ModeloResultados::getResultado($id);
            
            VistaResultadosFormUpdate::render($resultado);
        }

        public static function modificarResultado($resultado) {
            ModeloResultados::modificarResultado($resultado);

            $resultados = ModeloResultados::mostrarTodos();
            VistaResultados::render($resultados);
        }


    }



?>