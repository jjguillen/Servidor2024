<?php
    include "menu.html";
?>

    <div class="container">
    <h2>Ejercicio 14</h2>

<?php

    $notas = array(
        array("nombre" => "Javi", "materia" => "servidor", "nota" => 5),
        array("nombre" => "Ana", "materia" => "servidor", "nota" => 7),
        array("nombre" => "Sonia", "materia" => "cliente", "nota" => 3),
        array("nombre" => "Manuel", "materia" => "cliente", "nota" => 9),
        array("nombre" => "Sonia", "materia" => "servidor", "nota" => 7),
    );

    var_dump( $notas[0] );
    echo $notas[0]["nota"];
    echo $notas[2]["materia"];

    echo "<br>";

    foreach($notas as $valor) {
        echo $valor["nombre"] . ": " . $valor["nota"] . "<br>";
    }

    

    //array_column -> crea un nuevo array, con los valores de una columna de un array multidimensional"
    /*
    foreach(array_column($notas, "nombre") as $valor) {
        echo $valor."<br>";
    }
    foreach(array_column($notas, "nota") as $valor) {
        echo $valor."<br>";
    }
    */

    

    echo "Ordenar por notas <br>";

    //Ordena el array $notas, le pasamos el array con la columna que queremos ordenar
    array_multisort (array_column($notas, 'nota'), SORT_DESC, $notas);

    foreach($notas as $valor) {
        echo $valor["nombre"] . ": " . $valor["nota"] . "<br>";
    }

    echo "Ordenar por notas <br>";
    array_multisort (array_column($notas, 'nombre'), SORT_ASC, $notas);
    foreach($notas as $valor) {
        echo $valor["nombre"] . ": " . $valor["nota"] . "<br>";
    }

    echo "La nota media es : ";
    echo array_sum( array_column($notas, 'nota') ) / count(array_column($notas, 'nota'));

?>

    </div>
</body>
</html>