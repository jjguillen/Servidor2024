<?php

class Bicicleta {

    private $marca;
    private $cambio;
    private $esElectrica;

    function __construct($marca="BH", $cambio="Shimano", $esElectrica=true) {
        $this->marca = $marca;
        $this->cambio = $cambio;
        $this->esElectrica = $esElectrica;
    }




    /**
     * Get the value of cambio
     */ 
    public function getCambio()
    {
        return $this->cambio;
    }

    /**
     * Set the value of cambio
     *
     * @return  self
     */ 
    public function setCambio($cambio)
    {
        $this->cambio = $cambio;

        return $this;
    }

    /**
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of esElectrica
     */ 
    public function getEsElectrica()
    {
        return $this->esElectrica;
    }

    /**
     * Set the value of esElectrica
     *
     * @return  self
     */ 
    public function setEsElectrica($esElectrica)
    {
        $this->esElectrica = $esElectrica;

        return $this;
    }
}

    $bicicleta = new Bicicleta();
    echo $bicicleta->getMarca();

    $biciElectrica = new Bicicleta("Orbea", "Shimano", false);
    echo $biciElectrica->getMarca();

    $bicicleta2 = new Bicicleta(marca: "KTM", esElectrica: false);
    echo "<br>".$bicicleta2->getMarca()." ".$bicicleta2->getCambio()." ".$bicicleta2->getEsElectrica();

    //Mismo objeto
    $bicicleta3 = $bicicleta2;

    $bicicleta3->setCambio("-");
    echo "<br>".$bicicleta3->getMarca();
    echo "<br>".$bicicleta2->getCambio();

    //Clonar objeto
    $bicicleta4 = clone $bicicleta2;
    $bicicleta4->setCambio("Shimano");
    echo "<br>".$bicicleta4->getCambio();
    echo "<br>".$bicicleta2->getCambio();

?>