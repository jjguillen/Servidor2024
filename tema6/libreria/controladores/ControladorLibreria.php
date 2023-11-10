<?php

    class ControladorLibreria {       

        public static function mostrarInicio() {

            $vistaL = new VistaLibreria();
            $vistaL->render(null);
        }

        public static function mostrarBusqueda() {
            $vistaL = new VistaLibreria();
            $vistaL->renderBusqueda();
        }

        public static function nuevoFavorito() {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $imagen = $_POST['imagen'];
            $readLink = $_POST['readLink'];

            $favorito = new Favorito($id,$titulo,$imagen,$autor,$readLink);
            FavoritoBD::insertarFavorito($favorito);

            echo "Añadido a favoritos correctamente";

        }

        public static function verFavoritos() {
            $favoritos = FavoritoBD::getFavoritos();
            $vistaL = new VistaLibreria();
            $vistaL->renderFavoritos($favoritos);
        }

        public static function borrarFavorito() {
            FavoritoBD::borrarFavorito($_POST['id']);
            $favoritos = FavoritoBD::getFavoritos();
            $vistaL = new VistaLibreria();
            $vistaL->renderFavoritos($favoritos);

        }
    
        

    }







?>