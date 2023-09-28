<?php
  include "cabecera.php";
?>

    <main class="container">
        <div class="bg-light p-5 mt-5 rounded">
            
            <h3>Carro de la compra</h3>

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

      //Pintar el carro de la compra
      echo '<table class="table table-bordered border-secondary">';

      //Cabecera de la tabla
      echo '  <thead>';
      echo '    <tr>';
      echo '        <th scope="col" class="col-1">#</th>';
      echo '        <th scope="col" class="col-2">Imagen</th>';
      echo '        <th scope="col" class="col-7">Nombre</th>';
      echo '        <th scope="col" class="col-2">Precio</th>';
      echo '        <th scope="col" class="col-1">Cantidad</th>';
      echo '    </tr>';
      echo '  </thead>';
      echo '  <tbody>';

      //Cuerpo de la tabla
      $num = 1;
      $totalSinIva = 0;
      $totalConIva = 0;
      foreach($carro as $linea) {
        echo '  <tr>
                    <th scope="row">'.$num++.'</th>
                    <td><img src="'.$linea["img"].'" class="img-thumbnail" width="80px"></td>
                    <td>'.$linea["nombre"].'</td>
                    <td>'.$linea["precio"].'€</td>
                    <td>'.$linea["cantidad"].'</td>
                </tr>';

        //Actualizamos el total
        $totalSinIva += $linea["precio"] * $linea["cantidad"];
        if ($linea["ivaR"] == 0) {
            $totalConIva += ($linea["precio"] * 1.08) * $linea["cantidad"];
        } else {
            $totalConIva += ($linea["precio"] * 1.21) * $linea["cantidad"];
        }
      }
      echo '  </tbody>';

      //Pie de la tabla
      echo '  <tfoot>';
      echo '    <td scope="col" class="col-8 fw-bold" colspan="3">Total:</td>';
      echo '    <td scope="col" class="col-4 fw-bold" colspan="2">'.$totalConIva.'€<span class="p-3">Sin Iva: '.$totalSinIva.'€</span></td>';
      echo '  </tfoot>';

      echo '</table>';

?>


        </div>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
  </body>
</html>
