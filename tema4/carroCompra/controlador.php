<?php
    session_start();

    include_once("lib.php");


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

            $intereses = implode(",", $_POST["intereses"]);
            $comentarios = $_POST["comentarios"];

            //Controlar que las contraseñas sean iguales            
            if (strcmp($password, $password2) != 0) {
                //echo "Qué pasa";
                header("Location: registro.php?error=NoCoinciden");
                die();
            }

            //COMPROBAR QUE EL EMAIL NO ESTÁ YA EN BBDD
            if (!checkEmail($email)) {
                header("Location: registro.php?error=Email en uso");
                die();
            }

            //PROCESAR LA INFORMACIÓN, GRABAR EN BBDD
            $_SESSION['usuario'] = array("nombre" => $nombre, "email" => $email);

            //Encriptar password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT, [15]);

            //Insertar en BBDD
            insertarUsuario($nombre, $apellidos, $email, $direccion, $sexo, $provincia, $passwordHash, $intereses, $comentarios);

            //REDIRIGIR A INDEX.HTML
            header("Location: index.php");
            die();

        }


        //FORMULARIO DE LOGIN
        if (isset($_POST["formLogin"])) {
            //PROCESAR LA INFORMACIÓN
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (loginCorrecto($email, $password)) {
                $_SESSION['usuario'] = array("nombre" => "", "email" => $email);

                //REDIRIGIR A INDEX.HTML
                header("Location: index.php");
                die();
            } else {
                //REDIRIGIR A INDEX.HTML
                header("Location: login.php?error=Datos incorrectos");
                die();
            }

        }

        //FORMULARIO ADMIN - NUEVO PRODUCTO
        //FORMULARIO DE LOGIN
        if (isset($_POST["nuevoProducto"])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            if (isset($_POST['ivaR'])) {
                $ivaR = 1;
            } else {
                $ivaR = 0;
            }

            //Subir imagen
            $img = "";
            if(!isset($_FILES["img"])) {
                //echo "No estoy recibiendo el archivo";
            } elseif($_FILES["img"]["size"] == 0) {
                //Si el tamaño es 0, es porque el archivo no se envía al servidor
                //y puede ser porque supera MAX_FILE_SIZE del formulario o de php.ini
                //echo "El archivo no ha llegado correctamente";
            } elseif($_FILES["img"]["type"] != 'image/jpeg' && $_FILES["img"]["type"] != 'image/png' && $_FILES["img"]["type"] != 'image/webp') {
                //echo "No se permiten archivos diferentes de jpg";
                //Esto no es seguro porque sólo comprueba la extensión del fichero.
            } else {
                //Nos podemos fiar sólo en parte
                $destino = "./img/productos/" . $_FILES["img"]["name"];
                if(move_uploaded_file($_FILES["img"]["tmp_name"], $destino)) {
                    //echo "Tu archivo ha sido cargado correctamente";
                    $img = "img/productos/" . $_FILES["img"]["name"];
                }
                
            } 

            insertarProducto($nombre, $precio, $img, $categoria, $ivaR);

            //REDIRIGIR A INDEX.HTML
            header("Location: admin/index.php");
            die();
            
        }
        
        //FORMULARIO DE LOGIN
        if (isset($_POST["modificarProducto"])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $id = $_POST['id'];

            if (isset($_POST['ivaR'])) {
                $ivaR = 1;
            } else {
                $ivaR = 0;
            }

            //Subir imagen
            $img = "";
            if(!isset($_FILES["img"])) {
                //echo "No estoy recibiendo el archivo";
            } elseif($_FILES["img"]["size"] == 0) {
                //Si el tamaño es 0, es porque el archivo no se envía al servidor
                //y puede ser porque supera MAX_FILE_SIZE del formulario o de php.ini
                //echo "El archivo no ha llegado correctamente";
            } elseif($_FILES["img"]["type"] != 'image/jpeg' && $_FILES["img"]["type"] != 'image/png' && $_FILES["img"]["type"] != 'image/webp') {
                //echo "No se permiten archivos diferentes de jpg";
                //Esto no es seguro porque sólo comprueba la extensión del fichero.
            } else {
                //Nos podemos fiar sólo en parte
                $destino = "./img/productos/" . $_FILES["img"]["name"];
                if(move_uploaded_file($_FILES["img"]["tmp_name"], $destino)) {
                    //echo "Tu archivo ha sido cargado correctamente";
                    $img = "img/productos/" . $_FILES["img"]["name"];
                }    
            } 

            modificarProducto($id, $nombre, $precio, $img, $categoria, $ivaR);

            //REDIRIGIR A INDEX.HTML
            header("Location: admin/index.php");
            die();
            
        }

    }



//Si es una petición GET la tratamos aquí
    if($_GET) {
        //Por seguridad deberíamos comprobar que para hacer ciertas acciones debes estar logueado

        if (isset($_GET['accion'])) {

            //Acción cerrar sesión
        
            if (strcmp($_GET['accion'],"cerrarSesion") == 0) {
                session_destroy();

                header("Location: index.php");
                die();
            }
        

            //Acción de añadir producto al carro
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
        

            //Borrar producto del carro
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
        

            //Modificar cantidad del carro
            if (strcmp($_GET['accion'],"restarCantidad") == 0) { 
                $idProducto = $_GET['idProducto'];

                $posicion = array_search($idProducto, array_column($_SESSION['carro'], 'id'));

                if ($posicion !== FALSE) {
                    if ($_SESSION['carro'][$posicion]['cantidad'] > 1)
                        $_SESSION['carro'][$posicion]['cantidad']--;
                }

                //Redirigir a ver el carro de la compra
                header("Location: carro.php");
                die();
            }

            if (strcmp($_GET['accion'],"subirCantidad") == 0) { 
                $idProducto = $_GET['idProducto'];

                $posicion = array_search($idProducto, array_column($_SESSION['carro'], 'id'));

                if ($posicion !== FALSE) {
                    $_SESSION['carro'][$posicion]['cantidad']++;
                }

                //Redirigir a ver el carro de la compra
                header("Location: carro.php");
                die();
            }

            //Borrar producto BBDD
            if (strcmp($_GET['accion'],"borrarProducto") == 0) { 

                borrarProducto($_GET['id']);

                //REDIRIGIR A INDEX.HTML
                header("Location: admin/index.php");
                die();
            }

            if (strcmp($_GET['accion'],"comprar") == 0) {
                //Generar un pedido
                realizarPedido($_SESSION['carro']);

                header("Location: generarPDF.php");
                die();
            }

        }
    }

?>