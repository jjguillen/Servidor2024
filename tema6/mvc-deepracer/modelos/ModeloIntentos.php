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
            foreach($valor['intentos'] as $intento) {
                $intento = new Intento($intento['id'], $intento['nombre'], $intento['pista'], $intento['tiempo'], $intento['colisiones']);

                array_push($intentos, $intento);
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
            $intentos = $conexion->resultados->find([], ['projection' => ['intentos.id' => 1]]);
            var_dump($intentos);

            $deleteResult = $conexion->resultados->updateOne(['id' => intVal($idResultado)],
            [ '$push' => ['intentos' => [ 'id' => intVal(10),
                                          'nombre' => $intento->getNombre(),
                                          'pista' => $intento->getPista(),
                                          'tiempo' => intVal($intento->getTiempo()),
                                          'colisiones' => intVal($intento->getColisiones()) ]] ]);

            $conexionObject->cerrarConexion();
        }



    }