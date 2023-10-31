<?php
    namespace DeepRacer;
    use DeepRacer\controladores\ControladorDeepRacer;

    //Autocargar las clases --------------------------
    spl_autoload_register(function ($class) {
        
        //echo substr($class, strpos($class,"\\")+1);
        //include_once ".\\" . substr($class, strpos($class,"\\")+1) . '.php';
        include_once "./controladores/ControladorDeepRacer.php";
    });
    //Fin Autcargar ----------------------------------


    if ($_REQUEST) {
        //Tratamiento de botones, forms, ...


    } else {
        //Mostrar inicio
        echo "Inicio";
        ControladorDeepRacer::mostrarInicio();
    }





?>