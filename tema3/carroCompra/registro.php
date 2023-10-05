<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Registro</title>


    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="icon" href="img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    

  </head>
  <body class="text-center">
    
<main class="container-fluid mt-5">

  <div class="row">
    <div class="d-flex justify-content-center ">
      <form action="controlador.php" method="POST" class="col-xl-5">
        <img class="mb-4" src="img/cpu.png" alt="" width="57" height="57">
        <h1 class="h3 mb-3 fw-normal">Registro</h1>

<?php
      if (isset($_GET['error'])) {
        echo "<h5 class='text-danger'>No coinciden passwords</h5>";
      }

?>

        <div class="mb-2">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="nombre" placeholder="Javier" required>
        </div>
        <div class="mb-2">
          <label for="surn" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="surn" name="apellidos" placeholder="Guillén" required>
        </div>
        <div class="mb-2">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password"  required>
        </div>
        <div class="mb-2">
          <label for="password2" class="form-label">Repite password</label>
          <input type="password" class="form-control" id="password2" name="password2"  required>
        </div>
        <div class="mb-2">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="jj@gmail.com" required>
        </div>
        <div class="mb-2">
          <label for="address" class="form-label">Dirección</label>
          <input type="text" class="form-control" id="address" name="direccion" placeholder="Mi casa,n1">
        </div>

        <div class="mb-2">
          <input type="radio" class="form-check-input" id="sexo" name="sexo" value="hombre"><label class="form-check-label ms-2">Hombre</label>
        </div>
        <div class="mb-2">
          <input type="radio" class="form-check-input" id="sexo" name="sexo" value="mujer" checked><label class="form-check-label ms-2">Mujer</label>
        </div>

        <div class="mb-2">
          <label for="provincia" class="form-label">Provincia</label>

          <select class="form-select" id="provincia" name="provincia">
            <option selected value="almeria">Almería</option>
            <option value="cadiz">Cádiz</option>
            <option value="huelva">Huelva</option>
            <option value="granada">Granada</option>
            <option value="cordoba">Córdoba</option>
            <option value="jaen">Jaen</option>
            <option value="sevilla">Sevilla</option>
            <option value="malaga">Málaga</option>
          </select>
        </div>

        <div class="mb-2">
          <label for="intereses" class="form-label">Intereses</label>

          <select multiple class="form-select" id="intereses" name="intereses[]">
            <option selected value="portatiles">Portátiles</option>
            <option value="moviles">Móviles</option>
            <option value="3D">3D</option>
            <option value="iot">IoT</option>
            <option value="modding">Modding</option>
            <option value="fotografia">Fotografía</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="comentarios" class="form-label">Comentarios</label>
          <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
        </div>

        <div class="mb-2">
          <label for="politica" class="col-form-label-sm">Acepta política de privacidad</label>
          <input type="checkbox" class="col-form-control-sm" id="politica" name="acepta[]" value="politica">
        </div>
        <div class="mb-2">
          <label for="comun" class="col-form-label-sm">Acepta recibir comunicación por email</label>
          <input type="checkbox" class="col-form-control-sm" id="comun" name="acepta[]" value="comun">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="formRegistro">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023–2024</p>
      </form>
    </div>
    
  </div>
  
</main>


    
  </body>

  <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

</html>
