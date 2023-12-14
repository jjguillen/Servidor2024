<?php
    namespace Examen;
    use Examen\controladores\ControladorAI;
    use Examen\modelos\AmigoInvisible;
    use Examen\modelos\Participante;

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
            if ( strcmp($_REQUEST["accion"], "eliminarAI") == 0) {
                $id = $_REQUEST["id"];
                ControladorAI::delAI($id);
            }

            if ( strcmp($_REQUEST["accion"], "addAI") == 0) {
                $nombre = $_REQUEST["nombre"];
                $estado = "activo";
                $max_dinero = $_REQUEST["max_dinero"];
                $fecha_tope = $_REQUEST["fecha_tope"];
                $lugar = $_REQUEST["lugar"];
                $observaciones = $_REQUEST["observaciones"];
                $emoji = "";	
                
                $amigoI = new AmigoInvisible(1,$nombre,$estado,$max_dinero,$fecha_tope,$lugar,$observaciones,$emoji);
                ControladorAI::addAI($amigoI);
            }

            if ( strcmp($_REQUEST["accion"], "verParticipantes") == 0) {
                $id = $_REQUEST["id"];
                ControladorAI::verParticipantes($id);
            }

            if ( strcmp($_REQUEST["accion"], "borrarParticipante") == 0) {
                $idP = $_REQUEST["idP"];
                $idAI = $_REQUEST["idAI"];
                ControladorAI::deleteParticipante($idP, $idAI);
            }

            if ( strcmp($_REQUEST["accion"], "addParticipante") == 0) {
                $nombre = $_REQUEST["nombre"];
                $email = $_REQUEST["email"];
                $telefono = $_REQUEST["telefono"];
                $idRegalo = $_REQUEST["idRegalo"];

                $participante = new Participante(1, $nombre, $email, $telefono);
                ControladorAI::addParticipante($participante, $idRegalo);
            }

        } else {
            //Mostrar inicio
            ControladorAI::mostrarInicio();
        }
    }





?>