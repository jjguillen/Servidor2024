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

<?php echo "<h4>Asignaturas</h4>"; ?>

<?php
    for($i=0; $i < 4; $i++) {
        echo "Asignatura: ";
        echo "<strong>".$i."</strong>";
        echo "<br>";
    }
?>

<?php
    //Esto es un comentario de una línea
    $edad = 20;
    if ($edad >= 18) {
        echo "<strong class='text-primary'>Bienvenido, eres mayor de edad</strong>";
    } else {
        echo "<i>Lo siento</i>";
    }

    /**
     * Esto es un comentario largo
     * Es otra línea
     */

    $num = 2.456E33;
    var_dump($num);
    var_dump($edad);


    //Formulario
    echo '
        <form action="http://www2.gonzalonazareno.org/josedom/resultado.php" method="post">
            <p>
            Nombre: <input type="text" name="name_control" autofocus required />
            <br />
            Contraseña: <input type="password" name="pass_control" required />
            <br />
        </form>
    ';

    echo "\n\n\n";
    echo "<br>Tu \"edad\" es " . ($edad + $num) . " años";

    $javi = 0;
    if (is_null($javi)) { //Comprobar que el valor de la variable es nulo o no exite
        echo "Esa variable no existe";
    }

    $precioFinal = 100;
    $casado = true;

    if ($casado != true) {
        echo "<br>Lo siento";
    }


    //Arrays, índice es numérico
    $frutas = array("Pera", "Plátano", "Mango");
    $frutas[3] = "Manzana";
    echo $frutas[2];
    for($i = 0; $i < count($frutas); $i++) {
        echo "<br>$frutas[$i]";
    }

    //Arrays asociativo, la clave no es numérica
    $notas = array();
    $notas["Alfredo"] = 7;
    $notas["Joni"] = 8;
    //Recorrer un array asociativo
    foreach($notas as $clave => $valor) {
        echo "<br>$clave - $valor";
    }

    //                  índice  = >  valor 
    $capitales = array("España" => "Madrid", 
                        "Francia" => "París",
                        "Alemania" => "Berlín");
    echo $capitales["Francia"];
    echo "<br>";

    $alumnos = array(
        "a001" => array("Alfredo", 23, "Su casa", 65677799),
        "a002" => array("Javier", 19, "Su casa también", 656547889)
    );

    echo $alumnos["a001"][0] . " - " . $alumnos["a001"][3];

    echo "<br>";
    foreach($alumnos as $alumno) {
        foreach($alumno as $valor) {
            echo $valor . " ";
        }
        echo "<br>";
    }
    
    echo "Modificado";
 
?>


</body>
</html>
