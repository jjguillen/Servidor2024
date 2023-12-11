<?php

    class NoticiaBD {


        public static function getNoticias() {

            $conexion = ConexionBD::conectar();
            
            $coleccion = $conexion->noticias;

            $cursor = $coleccion->find([],
            [
                'sort' => ['fecha' => -1],
            ]);

            //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
            $noticias = array();
            foreach($cursor as $noticia) {
                $noticia_OBJ = new Noticia($noticia['id'],$noticia['encabezado'],$noticia['texto'] ,$noticia['fecha']->toDateTime()->format("m-d-Y"));
                array_push($noticias, $noticia_OBJ);
            }

            ConexionBD::cerrar();

            return $noticias;
        }

        public static function borrarNoticia($id) {
            $conexion = ConexionBD::conectar();

            $deleteResult = $conexion->noticias->deleteOne(['id' => intVal($id)]); 

            ConexionBD::cerrar();
        }

        public static function insertNoticia($noticia) {
            $conexion = ConexionBD::conectar();

            //Hacer el autoincrement
            //Ordeno por id, y me quedo con el mayor
            $noticiaMayor = $conexion->noticias->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($noticiaMayor))
                $idValue = $noticiaMayor['id'];
            else
                $idValue = 0;


           
            //Collección 'usuarios'
            $insertOneResult = $conexion->noticias->insertOne([
                'id' => intVal($idValue + 1),
                'encabezado' => $noticia->getEncabezado(),
                'texto' => $noticia->getTexto(),
                'fecha' =>new MongoDB\BSON\UTCDateTime(strtotime($noticia->getFecha()) * 1000)
            ]);

            ConexionBD::cerrar();
        }








    }





?>