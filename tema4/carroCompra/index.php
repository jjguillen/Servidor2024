<?php
  session_start();
  //session_destroy();

  include_once "cabecera.php";
  include_once "lib.php";
?>

    <main class="container">
        <div class="bg-light p-5 mt-5 rounded">
            
            <h3>Productos</h3>

<?php

    //Array con los productos del carro
    $productos = consultarProductos();
     
    echo '<div class="row">';

    foreach($productos as $linea) {

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



<!-- Javascript -->
<script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
  </body>
</html>
