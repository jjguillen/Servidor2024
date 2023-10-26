<?php

    include("Empleado.php");

    $empleado = new Empleado("Manuel", "Programador Junior", "manolo@gmail.com", 20000);
    echo $empleado->getEmail();

   


?>