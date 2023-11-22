<?php

    namespace DeepRacer\modelos;
    use DeepRacer\modelos\ConexionBaseDeDatos;
    use DeepRacer\modelos\Intento;
    use \PDO;

    class ModeloIntentos {


        public static function mostrarIntentos($idResultado) {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $valor = $conexion->resultados->findOne([ 'id' => intVal($idResultado)]);

            $intentos = array();
            if (isset($valor['intentos'] )) {
                foreach($valor['intentos'] as $intento) {
                    $intento = new Intento($intento['id'], $intento['nombre'], $intento['pista'], $intento['tiempo'], $intento['colisiones']);

                    array_push($intentos, $intento);
                }
            }
            $conexionObject->cerrarConexion();

            return $intentos;
        }

        public static function eliminarIntento($id, $idResultado) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $deleteResult = $conexion->resultados->updateOne(['id' => intVal($idResultado)],
            [ '$pull' => ['intentos' => [ 'id' => intVal($id)]] ]);

            $conexionObject->cerrarConexion();
        }


        public static function insertarIntento(Intento $intento, $idResultado) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            //Sacar todos los ids de intentos
            $match_stage = ['$match' => ['id' => intVal($idResultado)]];
            $unwind_stage = ['$unwind' => '$intentos'];
            $group_stage = ['$group' => ['_id' => '$id', 'max_id' => ['$max' => ['$toInt' => '$intentos.id']]]];

            $resultado = $conexion->resultados->aggregate([$match_stage, $unwind_stage, $group_stage]);

            $resultadoArray = $resultado->toArray();
            if (count($resultadoArray) > 0)
                $max_id = $resultadoArray[0]['max_id'];
            else
                $max_id = 0;

            $deleteResult = $conexion->resultados->updateOne(['id' => intVal($idResultado)],
            [ '$push' => ['intentos' => [ 'id' => intVal($max_id + 1),
                                          'nombre' => $intento->getNombre(),
                                          'pista' => $intento->getPista(),
                                          'tiempo' => intVal($intento->getTiempo()),
                                          'colisiones' => intVal($intento->getColisiones()) ]] ]);
            
            $conexionObject->cerrarConexion();
        }



    }