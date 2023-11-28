<?php

    namespace  Incidencias\modelos;

    use \PDO;

    class ModeloIncidencia {

        public static function mostrarIncidencias(){

            $conexionObject = new conexionBBDD();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM Incidencias");
            $consulta -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Incidencias'); //Nombre de la clase
            $consulta -> execute();

            $regalos = $consulta->fetchAll();

            $conexionObject -> cerrarConexion();

            return $regalos;
        }

        public static function editarIncidencia($id){

            $conexionObject = new conexionBBDD();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM Incidencias WHERE id = ?");
            $consulta -> bindValue(1, $id);
            $consulta -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Incidencias'); //Nombre de la clase
            $consulta -> execute();

            $regalos = $consulta->fetchAll();

            $conexionObject -> cerrarConexion();

            return $regalos;
        }

        public static function enviarModificarIncidencia($id, $solucion, $estado){

            $conexionObject = new conexionBBDD();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("UPDATE Incidencias SET solucion = ?, estado = ? where id = ? ");
            $consulta -> bindValue(1,$solucion);
            $consulta -> bindValue(2,$estado);
            $consulta -> bindValue(3,$id);
            $consulta -> execute();

            $conexionObject -> cerrarConexion();
        }
 
        public static function eliminarIncidencia($id){
            $conexionObject = new conexionBBDD();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("DELETE FROM Incidencias WHERE id = ?");
            $consulta -> bindValue(1,$id);
            $consulta -> execute();

            $conexionObject -> cerrarConexion();
        }

        public static function enviarModificarIncidencias($latitud, $longitud, $ciudad, $direccion, $solucion, $estado, $id){
            $conexionObject = new conexionBBDD();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("INSERT INTO Incidencias (latitud, longitud, ciudad, direccion, solucion, estado, idCliente) VALUES (?,?,?,?,?,?,?)");
            $consulta -> bindValue(1,$latitud);
            $consulta -> bindValue(2,$longitud);
            $consulta -> bindValue(3,$ciudad);
            $consulta -> bindValue(4,$direccion);
            $consulta -> bindValue(5,$solucion);
            $consulta -> bindValue(6,$estado);
            $consulta -> bindValue(7,$id);
            $consulta -> execute();

            $conexionObject -> cerrarConexion();
 
        }

        public static function buscarIncidencia($incidencia){

            $conexionObject = new conexionBBDD();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM Incidencias WHERE ciudad = ? OR estado LIKE '%$incidencia%'");
            $consulta -> bindValue(1,$incidencia);
            $consulta -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Incidencias'); //Nombre de la clase
            $consulta -> execute();

            $regalos = $consulta->fetchAll();

            $conexionObject -> cerrarConexion();

            return $regalos;
        }



        
    }


?> 