<?php

    namespace DeepRacer\modelos;
    use DeepRacer\modelos\ConexionBaseDeDatos;
    use DeepRacer\modelos\Intento;
    use \PDO;

    class ModeloIntentos {


        public static function mostrarIntentos($idResultado) {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT id,nombre,pista,tiempo,colisiones FROM intentos WHERE id_resultado=?");
            $consulta->bindValue(1, $idResultado);
            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DeepRacer\modelos\Intento'); //Nombre de la clase
            $consulta->execute();
    
            $intentos = $consulta->fetchAll();

            $conexionObject->cerrarConexion();

            return $intentos;
        }

        public static function eliminarIntento($id) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("DELETE FROM intentos WHERE id=:id");
            $consulta->bindValue(":id", $id);
            $consulta->execute();

            $conexionObject->cerrarConexion();
        }


        public static function insertarIntento(Intento $intento, $idResultado) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("INSERT INTO intentos (nombre, pista, tiempo, colisiones, id_resultado) VALUES (?,?,?,?,?)");
            $consulta->bindValue(1, $intento->getNombre());
            $consulta->bindValue(2, $intento->getPista());
            $consulta->bindValue(3, $intento->getTiempo());
            $consulta->bindValue(4, $intento->getColisiones());
            $consulta->bindValue(5, $idResultado);
            $consulta->execute();

            $conexionObject->cerrarConexion();
        }



    }