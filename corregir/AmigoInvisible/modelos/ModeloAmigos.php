<?php

    namespace Amigo\modelos;
    use Amigo\modelos\ConexionBaseDeDatos;
    use \PDO;


    class ModeloAmigos{

          //funcion que devuelve todas los amigos 
          public static function mostrarAmigos() {
            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();

            $consulta = $conexion->prepare("SELECT * FROM AmigoInvisible");
            
            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Amigo\modelos\AmigoInvisible'); //Nombre de la clase 
            $consulta->execute();
    
            $amigos= $consulta->fetchAll();//feachAll para devolver todos los datos de array y fetch solo es para devolver un solo elemento 

            $conexionObject->cerrarConexion();

         return $amigos;
    }


    public static function borrarAmigo($id) {
      $conexionObject = new ConexionBaseDeDatos();
      $conexion = $conexionObject->getConexion();

      $consulta = $conexion->prepare("DELETE FROM AmigoInvisible WHERE id=?");
      $consulta->bindValue(1, $id);
      $consulta->execute();

  }

  
  public static function getAmigo($id) {

    $conexionObject = new ConexionBaseDeDatos();
    $conexion = $conexionObject->getConexion();

    $consulta = $conexion->prepare("SELECT * FROM AmigoInvisible WHERE id=?");
    $consulta->bindValue(1,$id);
    $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Amigo\modelos\AmigoInvisible'); //Nombre de la clase
    $consulta->execute();

    $amigo = $consulta->fetch();
    $conexionObject->cerrarConexion();

    return $amigo;
  }


  public static function modificarA($nombre,$estado,$dinero,$fecha,$lugar,$observaciones,$id){
    $conexionObject = new ConexionBaseDeDatos();
    $conexion = $conexionObject->getConexion();

    $consulta = $conexion->prepare("UPDATE AmigoInvisible SET nombre = ?, estado = ?, max_dinero= ? ,fecha_tope = ?, lugar = ?, 
    observaciones = ? where id = ? ");

$consulta -> bindValue(1,$nombre);
$consulta -> bindValue(2,$estado);
$consulta -> bindValue(3,$dinero);
$consulta -> bindValue(4,$fecha);
$consulta -> bindValue(5,$lugar);
$consulta -> bindValue(6,$observaciones);
$consulta -> bindValue(7,$id);
$consulta -> execute();

$conexionObject -> cerrarConexion();



  }

  public static function añadir($nombre,$estado,$dinero,$fecha,$lugar,$observaciones){
    $conexionObject = new ConexionBaseDeDatos();
    $conexion = $conexionObject->getConexion();


    $consulta = $conexion->prepare("INSERT INTO AmigoInvisible (nombre, estado, max_dinero, fecha_tope, lugar, observaciones) VALUES (?,?,?,?,?,?)");
    $consulta -> bindValue(1,$nombre);
    $consulta -> bindValue(2,$estado);
    $consulta -> bindValue(3,$dinero);
    $consulta -> bindValue(4,$fecha);
    $consulta -> bindValue(5,$lugar);
    $consulta -> bindValue(6,$observaciones);

    $consulta -> execute();

    $conexionObject -> cerrarConexion();

  }


  //APARTADO MIEMBROS
  public static function miembros($id){
    $conexionObject = new ConexionBaseDeDatos();
    $conexion = $conexionObject->getConexion();
    $consulta = $conexion->prepare("SELECT * FROM AmigoInvisible_Participante WHERE id_amigoinvisible=?");
    $consulta -> bindValue(1,$id);
    $consulta -> execute();

    $resultado = $consulta->fetchAll();

    $conexionObject -> cerrarConexion();

    return $resultado;

    }
  }