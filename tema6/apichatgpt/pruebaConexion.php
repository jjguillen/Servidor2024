<?php

use MongoDB\Client;
require 'vendor/autoload.php';

class ConexionBD {

    private static $conexion;

    //Poned IP de vuestro MongoDB
    public static function conectar($database,$host="mongodb://localhost:27017",$user="root",$password="root") {
        try {
            //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
            //$host = "mongodb+srv://admin:evhT1Hu8ZasF8llx@cluster0.qmwhh.mongodb.net/".$database."?retryWrites=true&w=majority";
            $host = "mongodb://root:toor@mongo:27017/"; //MongoDB en Docker
            self::$conexion = (new Client($host))->{$database};
        } catch (Exception $e){
            echo $e->getMessage();
        }

        return self::$conexion;
    }

    public static function cerrar() {
        self::$conexion = null;
    }

    public static function insertPost($imagen, $texto) {
        $conexion = ConexionBD::conectar("post");

        //Collección 'post'
        $insertOneResult = $conexion->posts->insertOne([
            'imagen' => $imagen,
            'texto' => $texto
        ]);

        ConexionBD::cerrar();
    }

}

ConexionBD::conectar("post");
ConexionBD::insertPost($_GET['imagen'], "Texto del post");

echo "Va....";













?>