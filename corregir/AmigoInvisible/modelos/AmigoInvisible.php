<?php

namespace Amigo\modelos;


class AmigoInvisible{

    private $id;
    private $nombre; 
    private $estado; 
    private $max_dinero; 
    private $fecha_tope;
    private $lugar; 
    private $observaciones ; 
    private $emoji; //implementar api


    public function __contruct($id="",$nombre="",$estado="",$max_dinero="",$fecha_tope="",$lugar="",$observaciones=""){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->estado=$estado;
        $this->max_dinero=$max_dinero;
        $this->fecha_tope=$fecha_tope;
        $this->lugar=$lugar;
        $this->observaciones=$observaciones;
        
            
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
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
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of max_dinero
     */
    public function getMaxDinero()
    {
        return $this->max_dinero;
    }

    /**
     * Set the value of max_dinero
     */
    public function setMaxDinero($max_dinero): self
    {
        $this->max_dinero = $max_dinero;

        return $this;
    }

    /**
     * Get the value of fecha_tope
     */
    public function getFechaTope()
    {
        return $this->fecha_tope;
    }

    /**
     * Set the value of fecha_tope
     */
    public function setFechaTope($fecha_tope): self
    {
        $this->fecha_tope = $fecha_tope;

        return $this;
    }

    /**
     * Get the value of lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set the value of lugar
     */
    public function setLugar($lugar): self
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get the value of observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     */
    public function setObservaciones($observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get the value of emoji
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * Set the value of emoji
     */
    public function setEmoji($emoji): self
    {
        $this->emoji = $emoji;

        return $this;
    }
}

?>