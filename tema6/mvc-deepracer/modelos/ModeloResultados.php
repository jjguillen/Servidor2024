<?php

    namespace DeepRacer\modelos;
    use DeepRacer\modelos\ConexionBaseDeDatos;
    use DeepRacer\modelos\Resultado;
    use \PDO;
    use MongoDB\Client;

    class ModeloResultados {


        public static function mostrarTodos() {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $cursor = $conexion->resultados->find();

            $resultados = array();
            foreach ($cursor as $document) {
                //Construimos objeto Resultado con los datos de MongoDB
                $resultado = new Resultado($document['id'], $document['modelo'], $document['pista'], $document['tiempo'], $document['colisiones']);
                
                //Añadir el Resultado al array de resultados
                array_push($resultados, $resultado);
            }

            $conexionObject->cerrarConexion();

            return $resultados;
        }

        public static function eliminarResultado($id) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $deleteResult = $conexion->resultados->deleteOne(['id' => intVal($id)]);
            
            $conexionObject->cerrarConexion();
        }

        public static function insertar(Resultado $resultado) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            //Hacer el autoincrement
            //Ordeno por id, y me quedo con el mayor
            $resultadoMayor = $conexion->resultados->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($resultadoMayor))
                $idValue = $resultadoMayor['id'];
            else
                $idValue = 0;

            $consulta = $conexion->resultados->insertOne([
                'id' => intVal($idValue+1),
                'modelo' => $resultado->getModelo(),
                'pista' => $resultado->getPista(),
                'tiempo' => intVal($resultado->getTiempo()),
                'colisiones' => intVal($resultado->getColisiones())
            ]);

            $conexionObject->cerrarConexion();
        }


        public static function getResultado($id) {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $valor = $conexion->resultados->findOne([ 'id' => intVal($id)]);

            $resultado = new Resultado($valor['id'], $valor['modelo'], $valor['pista'], $valor['tiempo'], $valor['colisiones']);

            $conexionObject->cerrarConexion();

            return $resultado;
        }

        public static function modificarResultado($resultado) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $updateResult = $conexion->resultados->updateOne(
                ['id' => intVal($resultado->getId())],
                ['$set' => ['modelo' => $resultado->getModelo(),
                            'pista' => $resultado->getPista(),
                            'tiempo' => intVal($resultado->getTiempo()),
                            'colisiones' => intVal($resultado->getColisiones())]]
            );
    
            $conexionObject->cerrarConexion();
        }


    }