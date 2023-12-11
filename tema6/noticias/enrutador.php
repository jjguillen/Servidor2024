<?php
    session_start();
    //session_destroy();

    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./modelo/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }
    } 
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            //Inicio - Formulario Login
            if ($_REQUEST['accion'] == "inicio") {
                ControladorLogin::mostrarFormularioLogin();
            }

            //Inicio - error de login
            if ($_REQUEST['accion'] == "error") {
                ControladorLogin::mostrarFormularioLoginError();
            }

            //Mostrar noticias
            if ($_REQUEST['accion'] == "mostrarN") {
                ControladorNoticia::mostrarNoticias();
            }

            //CheckLogin
            if ($_REQUEST['accion'] == "checkLogin") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);
                ControladorLogin::chequearLogin($email, $password);
            }

            //Borrar noticia
            if ($_REQUEST['accion'] == "borrarN") {
                $id = $_REQUEST['id'];

                ControladorNoticia::borrarNoticia($id);
                ControladorNoticia::mostrarNoticiasAjax();
            }

            //Crear noticia en BD
            if ($_REQUEST['accion'] == "crearNoticia") {
                $noticia["encabezado"] = filtrado($_REQUEST['encabezado']);
                $noticia["fecha"] = filtrado($_REQUEST['fecha']);
                $noticia["texto"] = filtrado($_REQUEST['noticia']);

                ControladorNoticia::crearNoticia($noticia);
            }



        }
    }





?>