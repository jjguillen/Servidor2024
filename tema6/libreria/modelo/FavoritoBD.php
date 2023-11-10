<?php

require 'vendor/autoload.php';

    class FavoritoBD {

        public static function getFavoritos() {
            $conexion = ConexionBD::conectar("ejemplo"); //Base de datos 'ejemplo'

            $cursor = $conexion->libreria->find();

            //Crear los objetos para devolverlos (MVC)
            $favoritos = array();
            foreach($cursor as $favorito) {
               $favorito_OBJ = new Favorito($favorito['id'],$favorito['titulo'],$favorito['imagen'],$favorito['autor'], $favorito['readLink']);
               array_push($favoritos, $favorito_OBJ);
            }
            
            ConexionBD::cerrar();

            //Me devuelve un array de objetos
            return $favoritos;
        }

        public static function borrarFavorito($id) {
            $conexion = ConexionBD::conectar("ejemplo");
            $deleteResult = $conexion->libreria->deleteOne(['id' => $id]);   
            ConexionBD::cerrar();
        }

        public static function insertarFavorito($favorito) {
            $conexion = ConexionBD::conectar("ejemplo");

            //Habría que comprobar que el id del libro no está previamente en mongo

            //Collección 'usuarios'
            $insertOneResult = $conexion->libreria->insertOne([
                'id' => $favorito->getId(),
                'titulo' => $favorito->getTitulo(),
                'imagen' => $favorito->getImagen(),
                'autor' => $favorito->getAutor(),
                'readLink' => $favorito->getReadLink()
            ]);

            ConexionBD::cerrar();
        }









    }





?>