<?php
    namespace DeepRacer;
    use DeepRacer\controladores\ControladorDeepRacer;

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
            
            //MOSTRAR TODOS LOS RESULTADOS
            if (strcmp($_REQUEST['accion'],'mostrarTodos') == 0) {
                ControladorDeepRacer::mostrarTodos();
            }

            //ELIMINAR UN RESULTADO
            if (strcmp($_REQUEST['accion'],'eliminarResultado') == 0) {
                $id = $_REQUEST['id'];
                ControladorDeepRacer::eliminarResultado($id);
            }



        } else {
            //Mostrar inicio
            ControladorDeepRacer::mostrarInicio();
        }
    }





?>