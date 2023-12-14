<?php

namespace Amigo\controladores;


use Amigo\vistas\VistaInicio;
use Amigo\vistas\VistaAmigos;
use Amigo\vistas\VistaForm;
use Amigo\modelos\ModeloAmigos;
use Amigo\modelos\ModeloParitipante;


class ControladorAmigo{


     /**
         * Método que muestra la página principal de bienvenida (inicio)
         */
        public static function mostrarInicio() {
            VistaInicio::inicio();
        }

        /**
         * Mostrar todos amigos de la baset de datos 
         */

        public static function mostrarAmigos(){
            $amigos=ModeloAmigos::mostrarAmigos();
           // var_dump($amigos);
            VistaAmigos::render($amigos);

        }
        /**
        * Borrar Amigo de la base datos 
        */
        public static function borrarA($id){
           
           
            ModeloAmigos::borrarAmigo($id);
            $amigos=ModeloAmigos::mostrarAmigos();

            VistaAmigos::render($amigos);

        }

        /**
         * Modificar amigo
         */

        public static function modificarA($id){
           
            $amigo=ModeloAmigos::getAmigo($id);
           
           VistaForm::form($amigo);

        }

        public static function modificacion($id,$nombre,$estado,$dinero,$fecha,$lugar,$observaciones){

            
          ModeloAmigos::modificarA($nombre,$estado,$dinero,$fecha,$lugar,$observaciones,$id);
          $amigos=ModeloAmigos::mostrarAmigos();
          // var_dump($amigos);
           VistaAmigos::render($amigos);
          


        }


        /**
         * Mostrar form para añadir 
         */
        public static function añadirAmigo(){

            VistaForm::formAdd();
         }

         /**
         * Añadir amigo 
         */

         public static function añadir($nombre,$estado,$dinero,$fecha,$lugar,$observaciones){

            ModeloAmigos::añadir($nombre,$estado,$dinero,$fecha,$lugar,$observaciones);

            $amigos=ModeloAmigos::mostrarAmigos();
       
             VistaAmigos::render($amigos);
         }


         /**
          * MIEMBROS
          */

          public static function miembros($id){

           $resultado= ModeloAmigos::miembros($id);

           var_dump($resultado);
           foreach($resultado as $resultado){

            //$id_parti=$resultado->getId();
            
            //ModeloParticipante::getParticipante($id_parti);
           }

          }



}

?>