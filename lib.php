<?php

function saludo(&$nombre, $formalismo= " Buenos días ") {

    if ($nombre == "") {
        $nombre = "Pepe";
    }
    return $formalismo . " " . $nombre;
}

?>