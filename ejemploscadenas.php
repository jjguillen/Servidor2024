<?php
    include "menu.html";
?>

    <div class="container">

<?php

    echo strcmp("Hola","Hola")."<br>";
    echo strlen("Hola Mundo")."<br>";
    echo substr("Hola Mundo",4,5)."<br>";

    $mensaje = "Hola.Mundo.De.La.Programación";
    $array = explode(".",$mensaje);
    foreach($array as $valor) {
        echo $valor."<br>";
    }

    $ip = array(192,168,1,100);
    echo implode(":",$ip)."<br>";

    $mensaje = "No me gusta Docker, es muy complicado, Docker que se lo quede Javi";
    echo strpos($mensaje, "Docker");
    echo substr($mensaje, strpos($mensaje, "Docker"), strlen("Docker"))."<br>";

    echo str_replace("Docker","Git",$mensaje)."<br>";

?>
    </div>