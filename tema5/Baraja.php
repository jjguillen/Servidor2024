<?php

class Baraja {

    public static $numCartas=40;
    private $tipo;
    private $cartas = array();

    function __construct($tipo="española") {
        $this->tipo = $tipo;

        //Acceso a propiedad estática dentro de la clase
        for($i=0; $i < Baraja::$numCartas; $i++) {
            array_push($this->cartas, $i);
        }
    }

    public static function getInfo() {
        echo "<br>".Baraja::$numCartas;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of cartas
     */ 
    public function getCartas()
    {
        return $this->cartas;
    }
}

    //Acceso a propiedad estática fuera de la clase
    echo  Baraja::$numCartas;

    $barajaFrancesa = new Baraja("francesa");
    echo "<br>".$barajaFrancesa->getTipo();
    
    Baraja::getInfo();
    
    foreach($barajaFrancesa->getCartas() as $carta) {
        echo "<br>".$carta;
    }

?>