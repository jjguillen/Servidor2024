<?php

    echo $_SERVER['SERVER_ADDR']."<br>";
    echo $_SERVER['SERVER_SOFTWARE']."<br>";
    echo $_SERVER['REQUEST_METHOD']."<br>";
    echo $_SERVER['DOCUMENT_ROOT']."<br>";

    echo $_SERVER['REMOTE_ADDR']."<br>";
    echo $_SERVER['SCRIPT_FILENAME']."<br>";
    echo $_SERVER['SERVER_PORT']."<br>";

    if (isset($_GET['nombre']))
        echo $_GET['nombre']."<br>";

    if (isset($_GET['edads']))
        echo $_GET['edads']."<br>";

    if (isset($_GET['sexo']))
        echo $_GET['sexo']."<br>";
    

?>