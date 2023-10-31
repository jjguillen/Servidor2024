<?php
    namespace DeepRacer;
    use DeepRacer\controladores\ControladorDeepRacer;

    //Autocargar las clases --------------------------
    spl_autoload_register(function ($class) {
        
        echo "Autoload ".$class;
        include 'classes/' . $class . '.class.php';
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