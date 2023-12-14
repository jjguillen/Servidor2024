<?php
//Nombre del espacio 
namespace Amigo;
//nombre espacio + nombre carpeta :
use Amigo\controladores\ControladorAmigo;

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


        if (strcmp($_REQUEST['accion'],'entrar') == 0) {

            ControladorAmigo::mostrarAmigos();
        }
        //BORRAR UN AMIGO
        if (strcmp($_REQUEST['accion'],'borrarA') == 0) {

            $id=$_REQUEST['id'];

            ControladorAmigo::borrarA($id);
        }
        //MODIFICAR UN AMIGO 
        if (strcmp($_REQUEST['accion'],'modificarA') == 0) {

            $id=$_REQUEST['id'];

            ControladorAmigo::modificarA($id);
        }
        //OBTENER DATOS DEL FORM PARA MODIFICAR 
        if (strcmp($_REQUEST['accion'],'formModificar') == 0) {

            $id=$_REQUEST['id'];
            $nombre = $_REQUEST['nombre'];
            $estado = $_REQUEST['estado'];
            $dinero = $_REQUEST['max_dinero'];
            $fecha = $_REQUEST['fecha_tope'];
            $lugar = $_REQUEST['lugar'];
            $observaciones=$_REQUEST['observaciones'];

           
          
            ControladorAmigo::modificacion($id,$nombre,$estado,$dinero,$fecha,$lugar,$observaciones);
        }

        
        //MOSTRAR FORM PARA AÑADIR AMIGO
        if (strcmp($_REQUEST['accion'],'añadiramigo') == 0) {

            ControladorAmigo::añadirAmigo();

            
        }
        //AÑADIR AMIGO 
        if (strcmp($_REQUEST['accion'],'addAmigo') == 0) {

       
            $nombre = $_REQUEST['nombre'];
            $estado = "Activo";
            $dinero = $_REQUEST['max_dinero'];
            $fecha = $_REQUEST['fecha_tope'];
            $lugar = $_REQUEST['lugar'];
            $observaciones=$_REQUEST['observaciones'];

            ControladorAmigo::añadir($nombre,$estado,$dinero,$fecha,$lugar,$observaciones);

            
        }

        if (strcmp($_REQUEST['accion'],'miembros') == 0) {
          
            $id=$_REQUEST['id'];

            ControladorAmigo::miembros($id);
    } 
}
    
    else {
        //Mostrar inicio
        ControladorAmigo::mostrarInicio();
    }
}

?>