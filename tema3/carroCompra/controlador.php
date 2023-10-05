<?php
    session_start();

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

    }

?>