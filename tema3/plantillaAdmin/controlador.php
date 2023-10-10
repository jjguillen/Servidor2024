<?php
    session_start();

    if ($_POST) {
        if (isset($_POST['nombre'])) {

            $nombre = $_POST["nombre"];
            $fechaI = $_POST["fechaI"];
            $fechaF = $_POST["fechaF"];
            $porcentaje = $_POST["porcentaje"];
            $importancia = $_POST["importancia"];

            $proyecto = array("nombre" => $nombre,
                               "fechaI" => $fechaI,
                               "fechaF" => $fechaF,
                               "dias" => 0,
                               "porcentaje" => $porcentaje,
                               "importancia" => $importancia);

            array_push($_SESSION['proyectos'], $proyecto);

            header("Location: index.php");
            die();

        }

    }
    
















?>