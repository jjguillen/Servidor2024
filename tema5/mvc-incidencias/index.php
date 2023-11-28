<?php
    namespace Incidencias;
    use Incidencias\controladores\ControladorIncidencias;

    //Autocargar las clases --------------------------
    spl_autoload_register(function ($class) {
        //echo substr($class, strpos($class,"\\")+1);
        $ruta = substr($class, strpos($class,"\\")+1);
        $ruta = str_replace("\\", "/", $ruta);
        include_once "./" . $ruta . ".php"; 
    });
    //Fin Autcargar ----------------------------------


    if (isset($_REQUEST)) {
        //Tratamiento de botones, forms, ...
        if (isset($_REQUEST["accion"])) {


            //METODO PARA MOSTRAR INCIDENCIAS
            if (strcmp($_REQUEST['accion'],'mostrarIncidencias') == 0) {
                ControladorIncidencias::mostrarIncidencias();
            }

            //METODO PARA EDITAR INCIDENCIA
            if (strcmp($_REQUEST['accion'],'editarIndicencia') == 0) {
                $id = $_REQUEST['id'];

                ControladorIncidencias::editarIncidencia($id);
            }
            
            //METODO PARA ENVIAR EL MODIFICAR INCIDENCIA
            if (strcmp($_REQUEST['accion'],'enviarModificarIncidencia') == 0) {
                $id = $_REQUEST['id'];
                $solucion = $_REQUEST['solucion'];
                $estado = $_REQUEST['estado'];

                ControladorIncidencias::enviarModificarIncidencia($id, $solucion, $estado);
            }

            //METODO PARA ELIMINAR INCIDENCIA
            if (strcmp($_REQUEST['accion'],'eliminarIncidencia') == 0) {
                $id = $_REQUEST['id'];

                ControladorIncidencias::eliminarIncidencia($id);
            }

            //METODO PARA AÑADIR INCIDENCIA
            if (strcmp($_REQUEST['accion'],'añadirIncidencia') == 0) {

                ControladorIncidencias::añadirIncidencia();
            }

            //METODO PARA BUSCAR CLIENTE POR DNI O NOMBRE
            if (strcmp($_REQUEST['accion'],'buscarCliente') == 0) {
                $dni = $_REQUEST['dni'];

                ControladorIncidencias::buscarCliente($dni);
            }

            //METODO PARA MOSTRAR FORM AÑADIR INCIDENCIA
            if (strcmp($_REQUEST['accion'],'añadirIncidenciaCliente') == 0) {
                $id = $_REQUEST['id'];

                ControladorIncidencias::añadirIncidenciaCliente($id);
            }

            //METODO PARA AÑADIIR LA INCIDENCIA
            if (strcmp($_REQUEST['accion'],'enviarAñadirIncidencia') == 0) {
                $latitud = floatval($_REQUEST['latitud']);
                $longitud = floatval($_REQUEST['longitud']);
                $ciudad =$_REQUEST['ciudad'];
                $direccion = $_REQUEST['direccion'];
                $solucion = $_REQUEST['solucion'];
                $estado = $_REQUEST['estado'];
                $id = $_REQUEST['id'];

                ControladorIncidencias::enviarAñadirIncidencias($latitud, $longitud, $ciudad, $direccion, $solucion, $estado, $id);
            }

            //METODO PARA BUSCAR INCIDENCIA POR CIUDAD O ESTADO
            if (strcmp($_REQUEST['accion'],'buscarIncidencia') == 0) {
                $incidencia = $_REQUEST['incidencia'];

                ControladorIncidencias::buscarIncidencia($incidencia);
            }


            




        } else {
            //Mostrar inicio
            ControladorIncidencias::mostrarInicio();
        }
    }





?>