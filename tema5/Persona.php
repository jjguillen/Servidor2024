<?php

class Persona {

    private $nombre;
    private $edad;

    function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }


    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of edad
     */ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    public function pintarHTML() {
        echo "<p>Nombre: ".$this->nombre."<p>";
        echo "<p>Edad: ".$this->edad."<p>";
        
    }
}

?>