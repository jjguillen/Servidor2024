<?php

    namespace DeepRacer\modelos;
    use DeepRacer\modelos\ConexionBaseDeDatos;
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



    }