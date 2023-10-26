<?php

class Empleado {

    private $nombre;
    private $puesto;
    private $email;
    private $salario;

    function __construct($nombre, $puesto, $email, $salario) {
        $this->nombre = $nombre;
        $this->puesto = $puesto;
        $this->email = $email;
        $this->salario = $salario;
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
     * Get the value of puesto
     */ 
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Set the value of puesto
     *
     * @return  self
     */ 
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of salario
     */ 
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     *
     * @return  self
     */ 
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }


    public function plus() {
        return $this->salario * 1.05;
    }

}

/*
    $empleado1 = new Empleado("Javi", "Director", "jj@gmail.com", 40000);
    echo $empleado1->getSalario();
    echo $empleado1->plus();
*/












?>