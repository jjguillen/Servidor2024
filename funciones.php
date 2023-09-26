<?php
    include "menu.html";
    include "lib.php";  //Funciones útiles para usar
    include "Coche.php";
    use Proyecto\Servidor\Coche;
?>


    <div class='container'>
    <h2>Ejemplo funciones</h2>
<?php

    $nombre = "";
    echo saludo($nombre, "Buenas tardes "); //Esta función está en lib.php

    echo "<br>$nombre";


    $coche = new Coche;

?>

    </div>


   

</body>
</html>

