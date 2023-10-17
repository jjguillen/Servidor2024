<?php
  session_start();
  //session_destroy();

  include_once "cabecera.php";
?>

    <main class="container">
        <div class="bg-light p-5 mt-5 rounded">
            
            <h3>Productos</h3>

<?php

    //Array con los productos del carro
    $productos = array(

    array("id" => "p0001", "nombre" => "AMD Ryzen 7 5800X", "precio" => 325, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 0, "categoria" => "procesadores"),

    array("id" => "p0002", "nombre" => "Logitech 350", "precio" => 50, "cantidad" => 1, "img" => "./img/productos/pr2.webp", "ivaR" => 1, "categoria" => "ratones"),

    array("id" => "p0003", "nombre" => "Monitor AOC 32' OLED", "precio" => 610, "cantidad" => 1, "img" => "./img/productos/pr3.webp", "ivaR" => 0, "categoria" => "monitores"),

    array("id" => "p0004", "nombre" => "Teclado Ducky español", "precio" => 120, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 1, "categoria" => "teclados"),

    array("id" => "p0005", "nombre" => "Nvidia GTX 4090", "precio" => 2000, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 1, "categoria" => "graficas"),

    array("id" => "p0006", "nombre" => "SSD Samsung 980 Pro 2TB", "precio" => 170, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 0, "categoria" => "discos duros"),

    array("id" => "p0007", "nombre" => "AMD Ryzen 7 5850X", "precio" => 425, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 0, "categoria" => "procesadores"),

    array("id" => "p0008", "nombre" => "Logitech 450", "precio" => 70, "cantidad" => 1, "img" => "./img/productos/pr2.webp", "ivaR" => 1, "categoria" => "ratones"),

    array("id" => "p0009", "nombre" => "Monitor AOC 27' OLED", "precio" => 510, "cantidad" => 1, "img" => "./img/productos/pr3.webp", "ivaR" => 0, "categoria" => "monitores"),

    array("id" => "p00010", "nombre" => "Teclado Ducky español v3", "precio" => 150, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 1, "categoria" => "teclados"),

    array("id" => "p00011", "nombre" => "Nvidia GTX 4080", "precio" => 1200, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 1, "categoria" => "graficas"),
    
    array("id" => "p00012", "nombre" => "SSD Samsung 980 2TB", "precio" => 120, "cantidad" => 1, "img" => "./img/productos/pr1.webp", "ivaR" => 0, "categoria" => "discos duros"),
    );


    //Meter en la sesión todos los productos
    if (!isset($_SESSION['productos']))
        $_SESSION['productos'] = $productos;
     
    echo '<div class="row">';

    foreach($_SESSION['productos'] as $linea) {

        if ( (strcmp($categoria, "todas") == 0) || ( strcmp($categoria, $linea["categoria"]) == 0 ) ) {

          echo '<div class="col">';
          echo '
                  <div class="card mb-4" style="width: 18rem;">
                      <img src="'.$linea["img"].'" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h6 class="card-title">'.$linea["nombre"].'</h6>
                          <p class="card-text">'.$linea["precio"].'€</p>
                          
                          <a href="controlador.php?accion=addCarro&idProducto='.$linea["id"].'">
                          <button type="button" class="btn btn-primary text-light">
                            Comprar
                          </button></a>

                      </div>
                  </div>
          ';

          echo '</div>';
        } 
    }

    /**Modal
     * <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comprar">
                            Comprar
                        </button>
     */

    echo '</div>';

?>

        </div>
    </main>


<!-- MODALES -->
<!-- Modal para preguntar la cantidad al comprar un producto -->
<div class="modal fade" id="comprar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadiendo al carro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            <form id="formCantidad" action="carro.php" method="GET">
                <div class="row g-3 align-items-center">
                    <div class="col-10">
                        <label for="cantidad" class="col-form-label">¿Qué cantidad desea añadir?</label>
                    </div>
                    <div class="col-2">
                        <input type="number" id="cantidad" name="cantidad" class="form-control" value="1" min="1">
                    </div>
                </div>
            </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" form="formCantidad" class="btn btn-primary">Comprar</button>
      </div>
    </div>
  </div>
</div>

<!-- Javascript -->
<script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
  </body>
</html>
