<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulario que va a sí mismo</h2>


    <?php
        //Detectar si tengo que pintar el formulario o recoger sus valores
        if ($_POST) {
            echo "Pintar los datos recogidos del formulario";
            if (isset($_POST['nombre']))
                echo $_POST['nombre']."<br>";

            if (isset($_POST['edad']))
                echo $_POST['edad']."<br>";

            if (isset($_POST['sexo']))
                echo $_POST['sexo']."<br>";
        } else {
    ?>

    <form action="autoformulario.php" method="POST">
        <input type="text" name="nombre" id="">Nombre<br>
        <input type="number" name="edad" id="">Edad<br>
        <input type="password" name="password" id="">Password<br>
        <input type="radio" name="sexo" value="H" id="">Hombre<br>
        <input type="radio" name="sexo" value="M" id="">Mujer<br>

        <input type="submit" value="Enviar">
    </form>

    <?php
        }
    ?>

</body>
</html>