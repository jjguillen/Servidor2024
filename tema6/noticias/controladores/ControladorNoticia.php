<?php

    class ControladorNoticia {       

        public static function mostrarNoticias() {

            $noticias = NoticiaBD::getNoticias();
            VistaNoticias::render($noticias);
        }

        public static function mostrarNoticiasAjax() {

            $noticias = NoticiaBD::getNoticias();
            VistaNoticias::renderAjax($noticias);
        }

        public static function borrarNoticia($id) {
            NoticiaBD::borrarNoticia($id);
        }

        public static function crearNoticia($noticia) {
            $noticiaOO = new Noticia(0,$noticia['encabezado'],$noticia['texto'],$noticia['fecha']);
            NoticiaBD::insertNoticia($noticiaOO);
            ControladorNoticia::mostrarNoticiasAjax();
        }

    }







?>