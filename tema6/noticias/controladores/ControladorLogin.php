<?php
    class ControladorLogin {

        public static function mostrarFormularioLogin() {
            VistaLogin::mostrarFormularioLogin("");
        }

        public static function mostrarFormularioLoginError() {
            VistaLogin::mostrarFormularioLogin("Error de login, prueba otra vez");
        }


        public static function chequearLogin($email, $password) {
            $usuario = null;
            $valido = UsuarioBD::chequearLogin($email, $password, $usuario);

            //Error login
            if ($valido == 0) {
                echo "<script>window.location='enrutador.php?accion=error';</script>";
            }

            //Login correcto
            if ($valido == 1) {
                $_SESSION['usuario'] = serialize($usuario);
                echo "<script>window.location='enrutador.php?accion=mostrarN';</script>";
            }


        }


    }

?>

