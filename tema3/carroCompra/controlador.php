<?php
    session_start();

    //Función que dado un id de producto te devuelve el producto entero con la información que tiene en la sesión
    function buscarProducto($idProducto) {
        foreach($_SESSION['productos'] as $producto) {
            if (strcmp($producto['id'], $idProducto) == 0 ) {
                return $producto;
            }
        }

        return array();
    }


//Si es una petición POST la tratamos aquí
    if ($_POST) {
        //FORMULARIO DE REGISTRO
        if (isset($_POST["formRegistro"])) {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            $sexo = $_POST["sexo"];
            $provincia = $_POST["provincia"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];

            //Controlar que las contraseñas sean iguales            
            if (strcmp($password, $password2) != 0) {
                //echo "Qué pasa";
                header("Location: registro.php?error=NoCoinciden");
                die();
            }

            //PINTAR LA INFORMACIÓN - Incompatible con header()
            /*
            echo $nombre." ".$apellidos." ".$email." ".$direccion." ".$sexo."<br>";
            echo $provincia."<br>";

            if (isset($_POST['intereses'])) {
                $intereses = $_POST["intereses"];
                foreach ($intereses as $interes) {
                    echo $interes." ";
                }
                echo "<br>";
            }

            if (isset($_POST['acepta'])) {
                $acepta = $_POST['acepta'];
                foreach ($acepta as $valor) {
                    echo $valor." ";
                }
            }
            echo "<br>";
            */

            //PROCESAR LA INFORMACIÓN"
            $_SESSION['usuario'] = array("nombre" => $nombre, "email" => $email);

            //REDIRIGIR A INDEX.HTML
            header("Location: index.php");
            die();

        }


        //FORMULARIO DE LOGIN
        if (isset($_POST["formLogin"])) {
            //PROCESAR LA INFORMACIÓN
            $email = $_POST['email'];
            $_SESSION['usuario'] = array("nombre" => "", "email" => $email);

            //REDIRIGIR A INDEX.HTML
            header("Location: index.php");
            die();
        }


    }



//Si es una petición GET la tratamos aquí
    if($_GET) {
        //Por seguridad deberíamos comprobar que para hacer ciertas acciones debes estar logueado

        //Acción cerrar sesión
        if (isset($_GET['accion'])) {
            if (strcmp($_GET['accion'],"cerrarSesion") == 0) {
                session_destroy();

                header("Location: index.php");
                die();
            }
        }

        //Acción de añadir producto al carro
        if (isset($_GET['accion'])) {
            if (strcmp($_GET['accion'],"addCarro") == 0) {
                $idProducto = $_GET['idProducto'];

                //Preguntar si la variable del carro existe en la sesión
                if (!isset($_SESSION['carro'])) {
                    //Crear la variable del carro en la sesión
                    $_SESSION['carro'] = array();

                } 

                //Buscar el producto con el id del producto que se ha comprado
                $producto = buscarProducto($idProducto);

                //Buscar el id del producto en el carro
                $posicion = array_search($idProducto, array_column($_SESSION['carro'], 'id'));

                //Si el producto está ya en el carro actualizamos la cantidad
                if ($posicion !== FALSE) {
                    $_SESSION['carro'][$posicion]['cantidad']++;
                } else {
                    //Añadir una línea al carro
                    array_push($_SESSION['carro'], $producto);
                }   

                //Redirigir a ver el carro de la compra
                header("Location: carro.php");
                die();
                
            }
        }

        //Borrar producto del carro
        if (isset($_GET['accion'])) {
            if (strcmp($_GET['accion'],"borrarDelCarro") == 0) {

                $idProducto = $_GET['idProducto'];

                $posicion = array_search($idProducto, array_column($_SESSION['carro'], 'id'));

                if ($posicion !== FALSE) {
                    /*
                    unset($_SESSION['carro'][$posicion]);
                    //Reestructura índices del array
                    $_SESSION['carro'] = array_values($_SESSION['carro']);
                    */

                    //Elimina el elemento de la posición y reconstruye el array, se pierden los índices, los rehace
                    array_splice($_SESSION['carro'],$posicion,1);
                }

                //Redirigir a ver el carro de la compra
                header("Location: carro.php");
                die(); 
            }
        }

        //Modificar cantidad del carro
        if (isset($_GET['accion'])) {
            if (strcmp($_GET['accion'],"restarCantidad") == 0) { 
                $idProducto = $_GET['idProducto'];

                $posicion = array_search($idProducto, array_column($_SESSION['carro'], 'id'));

                if ($posicion !== FALSE) {
                    if ($_SESSION['carro'][$posicion]['cantidad'] > 1)
                        $_SESSION['carro'][$posicion]['cantidad']--;
                }
            }

            if (strcmp($_GET['accion'],"subirCantidad") == 0) { 
                $idProducto = $_GET['idProducto'];

                $posicion = array_search($idProducto, array_column($_SESSION['carro'], 'id'));

                if ($posicion !== FALSE) {
                    $_SESSION['carro'][$posicion]['cantidad']++;
                }
            }

            //Redirigir a ver el carro de la compra
            header("Location: carro.php");
            die();
        }

    }

?>