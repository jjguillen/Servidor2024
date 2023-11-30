<?php

    namespace Comentarios\modelos;
    use Comentarios\modelos\ConexionBaseDeDatos;
    use Comentarios\modelos\Comentario;

    class ModeloComentarios {


        public static function getComentarios($idPeli) {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $cursor = $conexion->comentarios->find([ 'idPeli' => intVal($idPeli) ]);

            $comentarios = array();
            foreach ($cursor as $document) {
                $comentario = new Comentario($document['id'], $document['idPeli'], $document['nick'], $document['comentario'], $document['nota']);
                
                //Añadir el Resultado al array de resultados
                array_push($comentarios, $comentario);
            }

            $conexionObject->cerrarConexion();

            return $comentarios;
        }

        public static function nuevoComentario($comentario) {
            
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            //Hacer el autoincrement
            //Ordeno por id, y me quedo con el mayor
            $resultadoMayor = $conexion->comentarios->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($resultadoMayor))
                $idValue = $resultadoMayor['id'];
            else
                $idValue = 0;

            $consulta = $conexion->comentarios->insertOne([
                'id' => intval($idValue+1),
                'idPeli' => intval($comentario->getIdPeli()),
                'nick' => $comentario->getNick(),
                'comentario' => $comentario->getComentario(),
                'nota' => intval($comentario->getNota())
            ]);

            $conexionObject->cerrarConexion();

        }

       

    }