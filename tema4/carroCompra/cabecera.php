<?php
    //Comprobamos   si hemos pinchado en una categoría
    if (isset($_GET['categoria'])) {
      $categoria = $_GET['categoria'];

      //ENCRIPTAR
      $cipher = "aes-128-cbc";
      $ivlen = openssl_cipher_iv_length($cipher);
      $iv = "1234567812345678";
      $key = "hljisaeypflajelakelvlealelakalll";
      
      //Leo el valor de la cookie y si tiene algo, le añado lo nuevo
      if (isset($_COOKIE["CategoriaPCC"])) {

        //Desencriptar cookie
        $cookieDecrypted = openssl_decrypt($_COOKIE["CategoriaPCC"], $cipher, $key, $options=0, $iv);

        //Pasar a array para quitar repetidos
        $arrayCategorias = explode("#", $cookieDecrypted);

        if (! is_numeric(array_search($categoria, $arrayCategorias)) ) {
          $categoriaCookie = $cookieDecrypted. "#" . $categoria;
          $ciphertext = openssl_encrypt($categoriaCookie, $cipher, $key, $options=0, $iv);
          setcookie("CategoriaPCC", $ciphertext, time() + 60, "/", "localhost");
        }
      } else {
        //Crear un cookie con la categoría elegida
        $ciphertext = openssl_encrypt($categoria, $cipher, $key, $options=0, $iv);
        setcookie("CategoriaPCC", $ciphertext, time() + 60, "/", "localhost");
      }

    } else {
      $categoria = "todas";

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Carrito de la compra</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Favicons -->

<link rel="icon" href="./img/iconotienda.png" sizes="32x32" type="image/png">

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
  <body>
    
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand me-5" href="#">Mi Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php?categoria=ratones">Ratones</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php?categoria=monitores">Monitores</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php?categoria=teclados">Teclados</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php?categoria=graficas">Gráficas</a>
                </li>
                
            </ul>
            <div class="d-flex">
<?php
  if (isset($_SESSION['usuario'])) {
    echo "<a href='controlador.php?accion=cerrarSesion' class='text-primary me-2'>".$_SESSION['usuario']['email']."</a>";
  } else {
  
?>
                <a href="./registro.php"><button class="btn btn-outline-success me-1" type="submit">Registro</button></a>
                <a href="./login.php"><button class="btn btn-outline-success me-1" type="submit">Login</button></a>

<?php
  }
?>               
                <a href="./carro.php"><button class="btn btn-outline-success" type="submit"><img src="./img/carro.png" alt=""></button></a>
            </div>
            </div>
        </div>
    </nav>