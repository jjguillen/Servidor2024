<?php

namespace Comentarios\modelos;
use MongoDB\Client;

class ConexionBaseDeDatos {

    private $conexion;

    public function __construct() {
    
        $this->conexion = (new Client('mongodb://root:toor@mongo:27017'))->pelisComentarios;
        
    }


    /**
     * Get the value of conexion
     */ 
    public function getConexion()
    {
        return $this->conexion;
    }

    public function cerrarConexion() {
        $this->conexion = null;
    }
}