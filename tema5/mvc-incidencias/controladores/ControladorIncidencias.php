<?php

    namespace Incidencias\controladores;

    use Incidencias\modelos\ModeloIncidencia;
    use Incidencias\vistas\VistaInicio;
    use Incidencias\vistas\VistaModificarIncidencia;
    use Incidencias\vistas\VistaResultados;
    use Incidencias\modelos\ModeloCliente;
    use Incidencias\vistas\VistaResultadosClientes;
    use Incidencias\vistas\VistaAñadirIncidencia;

    class ControladorIncidencias {

        //METODO PARA MOSTRAR INICIO
        public static function mostrarInicio() {

            VistaInicio::render();
        }

        //METODO PARA MOSTRAR INCIDENCIAS
        public static function mostrarIncidencias() {

            $incidencias = ModeloIncidencia::mostrarIncidencias();

            VistaResultados::render($incidencias);
        }

        //METODO PARA EDITAR INCIDENCIAS 
        public static function editarIncidencia($id) {

            $incidencia = ModeloIncidencia::editarIncidencia($id);

            VistaModificarIncidencia::render($incidencia);
        }
        
        //METODO PARA MODIFICAR INCIDENCIA
        public static function enviarModificarIncidencia($id, $solucion, $estado) {

            ModeloIncidencia::enviarModificarIncidencia($id, $solucion, $estado);

            $incidencias = ModeloIncidencia::mostrarIncidencias();

            VistaResultados::render($incidencias);
        }

        //METODO PARA ELIMINAR INCIDENCIA
        public static function eliminarIncidencia($id) {

            ModeloIncidencia::eliminarIncidencia($id);

            $incidencias = ModeloIncidencia::mostrarIncidencias();

            VistaResultados::render($incidencias);
        }

        //METODO PARA MOSTRAR CLIENTES NUEVA INCIDENCIA
        public static function añadirIncidencia() {
            
            $clientes = ModeloCliente::mostrarClientes();

            VistaResultadosClientes::render($clientes);
        }

        //METODO PARA BUSCAR CLIENTES
        public static function buscarCliente($dni) {
            
            $clientes = ModeloCliente::buscarCliente($dni);

            VistaResultadosClientes::render($clientes);
        }

        //METODO PARA AÑADIR INCIDENCIA COGIENDO EL CLIENTE
        public static function añadirIncidenciaCliente($id) {

            VistaAñadirIncidencia::render($id);
        }

        //METODO PARA AÑADIR LA INCIDENCIA
        public static function enviarAñadirIncidencias($latitud, $longitud, $ciudad, $direccion, $solucion, $estado, $id) {

            ModeloIncidencia::enviarModificarIncidencias($latitud, $longitud, $ciudad, $direccion, $solucion, $estado, $id);

            $incidencias = ModeloIncidencia::mostrarIncidencias();

            VistaResultados::render($incidencias);
        }

        //METODO PARA BUSCAR INCIDENCIAS
        public static function buscarIncidencia($incidencia) {

            $incidencias = ModeloIncidencia::buscarIncidencia($incidencia);

            VistaResultados::render($incidencias);
        }




    }



?>