<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <h2>Noticias 24</h2>

<?php
    if (isset($_SESSION['usuario'])) {
        echo "<h6 class='text-secondary'>Soy: ". unserialize($_SESSION['usuario'])->getEmail() ."</h6>";
    } else {
        echo "<script>window.location='enrutador.php?accion=inicio';</script>";
    }
?>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevaNoticia">
            Nueva
        </button>

        <div id="ajax">
    