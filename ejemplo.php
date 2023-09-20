<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo PHP</title>
</head>
<body>
        <h2>Ejemplo PHP</h2>

<?php
    $nombre = "Javier";
    echo $nombre;

    echo "<br>";

    $nombre = "Profesor Servidor IES Jaroso";
    echo $nombre;
?>

    <h4>Asignaturas</h4>

<?php
    for($i=0; $i < 4; $i++) {
        echo "Asignatura: ";
        echo "<strong>".$i."</strong>";
        echo "<br>";
    }
?>

</body>
</html>
