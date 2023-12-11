<?php

    require_once './vendor/autoload.php';

    use MongoDB\Client;

    class ConexionBD {

        private static $conexion;


        public static function conectar($bd="noticias") {

            try {
                //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
                //$host = "mongodb+srv://admin:rYuEG2NUGn0hpl4o@cluster0.qmwhh.mongodb.net/?retryWrites=true&w=majority";
                $host = "mongodb://root:toor@mongo:27017/"; //MongoDB en Docker
                self::$conexion = (new Client($host))->{$bd};
            } catch (Exception $e){
                echo $e->getMessage();
            }
            return self::$conexion;

        }

        public static function cerrar() {
            self::$conexion = null;
        }


    }













?>