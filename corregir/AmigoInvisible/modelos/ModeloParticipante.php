<?php

    namespace Amigo\modelos;
    use Amigo\modelos\ConexionBaseDeDatos;
    use \PDO;


    class ModeloParticipante{

          //funcion que devuelve todoso los participantes 
          public static function mostrarParticipantes() {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM Participante");
            
            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Amigo\modelos\Participante'); //Nombre de la clase 
            $consulta->execute();
    
            $participantes= $consulta->fetchAll();//feachAll para devolver todos los datos de array y fetch solo es para devolver un solo elemento 

            $conexionObject->cerrarConexion();

         return $participantes;
    }


    public static function getParticipante($id) {

        $conexionObject = new ConexionBaseDeDatos();
        $conexion = $conexionObject->getConexion();
    
        $consulta = $conexion->prepare("SELECT * FROM Participante WHERE id=?");
        $consulta->bindValue(1,$id);
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Amigo\modelos\Participante'); //Nombre de la clase
        $consulta->execute();
    
        $participante = $consulta->fetch();
        $conexionObject->cerrarConexion();
    
        return $participante;
      }

}
