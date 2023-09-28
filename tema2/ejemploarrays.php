<?php
    include "menu.html";
?>

    <div class="container">

<?php

    $frutas1 = ["melon","pera","platano"];
    $frutas2 = ["naranja", "pera", "platano"];

    $frutasNoRep = array_diff($frutas1, $frutas2);
    foreach($frutasNoRep as $valor) {
        echo $valor." ";
    }
    echo "<br>";

    $todasFrutas = array_merge($frutas1, $frutas2);
    foreach($todasFrutas as $valor) {
        echo $valor." ";
    }
    echo "<br>";

    $paises = ["EEUU", "Rusia", "Portugal", "Grecia", "Perú"];
    $capitales = ["Washington", "Moscú", "Lisboa", "Atenas", "Lima"];

    $paises_capitales = array_combine($paises, $capitales);
    foreach($paises_capitales as $pais => $capital) {
        echo $pais . " -> " . $capital . "<br>";
    }

    arsort($capitales);
    foreach($capitales as $capital) {
        echo $capital . " ";
    }
    echo "<br>";

    krsort($paises_capitales);
    foreach($paises_capitales as $pais => $capital) {
        echo $pais . " -> " . $capital . "<br>";
    }

    $numeros = [7, 5, 23, 100, 33, 71, 27];
    array_shift($numeros);
    var_dump($numeros);
    echo "<br>";

    array_unshift($numeros,66, 18);
    var_dump($numeros);
    echo "<br>";

    array_pop($numeros);
    var_dump($numeros);
    echo "<br>";

    array_push($numeros,66, 18);
    var_dump($numeros);
    echo "<br>";



    if (in_array("Moscú", $capitales) == TRUE) {
        echo "Encontrado<br>";
    } else {
        echo "No encontrado<br>";
    };

    if (array_key_exists("Japón", $paises_capitales) == TRUE) {
        echo "Encontrado<br>";
    } else {
        echo "No encontrado<br>";
    };


    $paises2 = array_keys($paises_capitales);
    var_dump($paises2);

    echo "<br>";
    
    $capitales2 = array_values($paises_capitales);
    var_dump($capitales2);







?>