<?php
    namespace DeepRacer;

    session_start();
    //session_destroy();

    use DeepRacer\controladores\ControladorDeepRacer;
    use DeepRacer\controladores\ControladorDeepRacerIntentos;
    use DeepRacer\modelos\Intento;
    use DeepRacer\modelos\Resultado;

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
                //Comprobar si estamos logueados
                if (isset($_SESSION['usuario'])) {
                    ControladorDeepRacer::mostrarTodos();
                } else {
                    //Pintar login
                    ControladorDeepRacer::mostrarFormLogin("");
                }
            }

            //CERRAR SESIÓN
            if (strcmp($_REQUEST['accion'],'cerrarSesion') == 0) {
                session_destroy();
                header("Location: index.php?accion=mostrarTodos");
            }

            //RECOGER FORM LOGIN Y MOSTRAR
            if (strcmp($_REQUEST['accion'],'loginUsuarios') == 0) {
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                ControladorDeepRacer::checkLogin($email, $password);
            }

            //ELIMINAR UN RESULTADO
            if (strcmp($_REQUEST['accion'],'eliminarResultado') == 0) {
                $id = $_REQUEST['id'];
                ControladorDeepRacer::eliminarResultado($id);
            }

            //MOSTRAR FORM NUEVO RESULTADO
            if (strcmp($_REQUEST['accion'],'mostrarFormNuevoResultado') == 0) {
                ControladorDeepRacer::mostrarFormNuevoResultado();
            }

            //RECIBIR FORM NUEVO RESULTADO
            if (strcmp($_REQUEST['accion'],'recibirFormNuevoResultado') == 0) {
                $modelo = $_REQUEST['modelo'];
                $pista = $_REQUEST['pista'];
                $tiempo = $_REQUEST['tiempo'];
                $colisiones = $_REQUEST['colisiones'];

                $resultado = new Resultado(modelo:$modelo, pista:$pista, tiempo:$tiempo, colisiones:$colisiones);

                ControladorDeepRacer::insertarNuevoResultado($resultado);
            }

            //MODIFICAR RESULTADO FORM
            if (strcmp($_REQUEST['accion'],'modificarResultadoForm') == 0) {
                $id = $_REQUEST['id'];
                ControladorDeepRacer::mostrarFormModificarResultado($id);
            }

            //MODIFICAR RESULTADO
            if (strcmp($_REQUEST['accion'],'recibirFormModificarResultado') == 0) {
                $id = $_REQUEST['id'];
                $modelo = $_REQUEST['modelo'];
                $pista = $_REQUEST['pista'];
                $tiempo = $_REQUEST['tiempo'];
                $colisiones = $_REQUEST['colisiones'];

                $resultado = new Resultado(id:$id, modelo:$modelo, pista:$pista, tiempo:$tiempo, colisiones:$colisiones);

                ControladorDeepRacer::modificarResultado($resultado);
            }

            //VER INTENTOS DE UN RESULTADO
            if (strcmp($_REQUEST['accion'],'verIntentos') == 0) {
                $idResultado = $_REQUEST['id'];
                ControladorDeepRacerIntentos::verIntentos($idResultado);
            }

            //ELIMINAR UN INTENTO
            if (strcmp($_REQUEST['accion'],'eliminarIntento') == 0) {
                $id = $_REQUEST['id'];
                $idResultado = $_REQUEST['idResultado'];
                ControladorDeepRacerIntentos::eliminarIntento($id, $idResultado);
            }

            //MOSTRAR FORM NUEVO RESULTADO
            if (strcmp($_REQUEST['accion'],'mostrarFormNuevoIntento') == 0) {
                $idResultado = $_REQUEST['idResultado'];
                ControladorDeepRacerIntentos::mostrarFormNuevoIntento($idResultado);
            }

            //RECIBIR FORM NUEVO INTENTO
            if (strcmp($_REQUEST['accion'],'recibirFormNuevoIntento') == 0) {
                $nombre = $_REQUEST['nombre'];
                $pista = $_REQUEST['pista'];
                $tiempo = $_REQUEST['tiempo'];
                $colisiones = $_REQUEST['colisiones'];
                $idResultado = $_REQUEST['idResultado'];

                $intento = new Intento(nombre:$nombre, pista:$pista, tiempo:$tiempo, colisiones:$colisiones);

                ControladorDeepRacerIntentos::insertarNuevoIntento($intento, $idResultado);
            }
        } else {
            //Mostrar inicio
            ControladorDeepRacer::mostrarInicio();
        }
    }





?>