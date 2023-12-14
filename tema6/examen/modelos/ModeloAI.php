<?php

    namespace  Examen\modelos;

    use \PDO;
    use Examen\modelos\ConexionBaseDeDatos;
    use Examen\modelos\Participante;

    class ModeloAI {

        public static function mostrarAIs(){

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM AmigoInvisible");
            $consulta -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\AmigoInvisible'); //Nombre de la clase
            $consulta -> execute();

            $regalos = $consulta->fetchAll();

            $conexionObject -> cerrarConexion();

            return $regalos;
        }

        public static function getRegalo($id){

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM AmigoInvisible WHERE id= ?");
            $consulta->bindValue(1, $id);
            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\AmigoInvisible'); //Nombre de la clase
            $consulta->execute();

            $regalo = $consulta->fetch();

            $conexionObject -> cerrarConexion();

            return $regalo;
        }

        public static function delAI($id){
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("DELETE FROM AmigoInvisible WHERE id = ?");
            $consulta -> bindValue(1,$id);
            $consulta -> execute();

            $conexionObject -> cerrarConexion();
        }

        public static function addAI($amigoI){
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("INSERT INTO AmigoInvisible (nombre, estado, max_dinero, fecha_tope, lugar, observaciones, emoji) VALUES (?,?,?,?,?,?,?)");
            $consulta -> bindValue(1,$amigoI->getNombre());
            $consulta -> bindValue(2,$amigoI->getEstado());
            $consulta -> bindValue(3,$amigoI->getMax_dinero());
            $consulta -> bindValue(4,$amigoI->getFecha_tope());
            $consulta -> bindValue(5,$amigoI->getLugar());
            $consulta -> bindValue(6,$amigoI->getObservaciones());
            $consulta -> bindValue(7,$amigoI->getEmoji());
            $consulta -> execute();

            $conexionObject -> cerrarConexion();
 
        }

        public static function getParticipantes($id){

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT p.*, aip.estado FROM Participante p 
                    INNER JOIN AmigoInvisible_Participante aip
                    WHERE aip.id_amigoinvisible = ? AND
                          aip.id_participante = p.id
            ");
            $consulta->bindValue(1, $id);
            $consulta -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\Participante'); //Nombre de la clase
            $consulta -> execute();

            $participantes = $consulta->fetchAll();

            $conexionObject -> cerrarConexion();

            return $participantes;
        }
        

        public static function deleteParticipante($idP, $idAI){
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("DELETE FROM AmigoInvisible_Participante WHERE id_amigoinvisible = ?
                AND id_participante = ?");
            $consulta -> bindValue(1,$idAI);
            $consulta -> bindValue(2,$idP);
            $consulta -> execute();

            $conexionObject -> cerrarConexion();
        }

        public static function addParticipante($participante, $idAI){
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            //Insertar en participante
            $consulta = $conexion->prepare("INSERT INTO Participante (nombre, email, telefono) VALUES (?,?,?)");
            $consulta -> bindValue(1,$participante->getNombre());
            $consulta -> bindValue(2,$participante->getEmail());
            $consulta -> bindValue(3,$participante->getTelefono());
            $consulta -> execute();
            $idParticipante = $conexion->lastInsertId();

            //Insertar en la tabla intermedia
            $consulta = $conexion->prepare("INSERT INTO AmigoInvisible_Participante (id_amigoinvisible, id_participante, estado) VALUES (?,?,?)");
            $consulta -> bindValue(1,$idAI);
            $consulta -> bindValue(2,$idParticipante);
            $consulta -> bindValue(3,"No sé qué regalar");
            $consulta -> execute();

            $conexionObject -> cerrarConexion();
        }

        
    }


?> 