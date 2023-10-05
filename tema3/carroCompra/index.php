<?php
  session_start();
  include "cabecera.php";
?>

    <main class="container">
        <div class="bg-light p-5 mt-5 rounded">
            
            <h3>Productos</h3>

<?php

    //Array con los productos del carro
    $carro = array(

    array("nombre" => "AMD Ryzen 7 5800X", "precio" => 325, "cantidad" => 1,
                "img" => "./img/productos/pr1.webp", "ivaR" => 0),
    array("nombre" => "Logitech 350", "precio" => 50, "cantidad" => 10,
                "img" => "./img/productos/pr2.webp", "ivaR" => 1),
    array("nombre" => "Monitor AOC 32' OLED", "precio" => 610, "cantidad" => 1,
                "img" => "./img/productos/pr3.webp", "ivaR" => 0),
    array("nombre" => "Teclado Ducky español", "precio" => 120, "cantidad" => 2,
                "img" => "./img/productos/pr1.webp", "ivaR" => 1),
    array("nombre" => "Nvidia GTX 4090", "precio" => 2000, "cantidad" => 1,
                "img" => "./img/productos/pr1.webp", "ivaR" => 1),
    array("nombre" => "SSD Samsung 980 Pro 2TB", "precio" => 170, "cantidad" => 2,
                "img" => "./img/productos/pr1.webp", "ivaR" => 0),

    );
     
    echo '<div class="row">';

    foreach($carro as $linea) {
        echo '<div class="col">';
        echo '
                <div class="card mb-4" style="width: 18rem;">
                    <img src="'.$linea["img"].'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">'.$linea["nombre"].'</h6>
                        <p class="card-text">'.$linea["precio"].'€</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comprar">
                            Comprar
                        </button>

                    </div>
                </div>
        ';

        echo '</div>';
    }

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
