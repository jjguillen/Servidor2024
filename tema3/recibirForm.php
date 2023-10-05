<?php

//var_dump($_POST);
if ($_POST) {
    if (isset($_POST['nombre']))
        echo $_POST['nombre']."<br>";

    if (isset($_POST['edad']))
        echo $_POST['edad']."<br>";

    if (isset($_POST['sexo']))
        echo $_POST['sexo']."<br>";
}
  
if (isset($_GET['nombre']))
    echo $_GET['nombre']."<br>";
?>