<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    
<h2>Formulario</h2>

    <form action="recibirForm.php" method="POST">
        <input type="text" name="nombre" id="" required>Nombre<br>
        <input type="number" name="edad" id="">Edad<br>
        <input type="password" name="password" id="">Password<br>
        <input type="radio" name="sexo" value="H" id="">Hombre<br>
        <input type="radio" name="sexo" value="M" id="">Mujer<br>

        <input type="submit" value="Enviar">
    </form>

    <a href="./recibirForm.php?nombre=Pepe">Ir</a>
    <button><a href="./recibirForm.php?nombre=Pepe%20Luis">Ir</a></button>
    

</body>
</html>