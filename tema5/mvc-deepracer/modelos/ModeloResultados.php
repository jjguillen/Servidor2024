<?php

    namespace DeepRacer\modelos;
    use DeepRacer\modelos\ConexionBaseDeDatos;
    use DeepRacer\modelos\Resultado;
    use \PDO;

    class ModeloResultados {


        public static function mostrarTodos() {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM resultados");
            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DeepRacer\modelos\Resultado'); //Nombre de la clase
            $consulta->execute();
    
            $resultados = $consulta->fetchAll();

            $conexionObject->cerrarConexion();

            return $resultados;
        }

        public static function eliminarResultado($id) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("DELETE FROM resultados WHERE id=:id");
            $consulta->bindValue(":id", $id);
            $consulta->execute();

            $conexionObject->cerrarConexion();
        }

        public static function insertar(Resultado $resultado) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("INSERT INTO resultados (modelo, pista, tiempo, colisiones) VALUES (?,?,?,?)");
            $consulta->bindValue(1, $resultado->getModelo());
            $consulta->bindValue(2, $resultado->getPista());
            $consulta->bindValue(3, $resultado->getTiempo());
            $consulta->bindValue(4, $resultado->getColisiones());
            $consulta->execute();

            $conexionObject->cerrarConexion();
        }


        public static function getResultado($id) {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM resultados WHERE id=:id");
            $consulta->bindValue(":id",$id);
            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DeepRacer\modelos\Resultado'); //Nombre de la clase
            $consulta->execute();
    
            $resultados = $consulta->fetch();
            $conexionObject->cerrarConexion();

            return $resultados;
        }

        public static function modificarResultado($resultado) {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("UPDATE resultados SET modelo=?, pista=?, tiempo=?, colisiones=? WHERE id=?");
            $consulta->bindValue(1,$resultado->getModelo());
            $consulta->bindValue(2,$resultado->getPista());
            $consulta->bindValue(3,$resultado->getTiempo());
            $consulta->bindValue(4,$resultado->getColisiones());
            $consulta->bindValue(5,$resultado->getId());

            $consulta->execute();
    
            $conexionObject->cerrarConexion();
        }


    }