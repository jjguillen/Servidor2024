<?php
  session_start();
  include "cabecera.php";
?>

    <main class="container">
        <div class="bg-light p-5 mt-5 rounded">
            
            <h3>Carro de la compra</h3>
            <hr class="text-dark mb-4">

<?php
      //Leer la cookie, desencriptándola
      $cipher = "aes-128-cbc";
      $ivlen = openssl_cipher_iv_length($cipher);
      $iv = "1234567812345678";
      $key = "hljisaeypflajelakelvlealelakalll";
      $cookieDecrypted = openssl_decrypt($_COOKIE["CategoriaPCC"], $cipher, $key, $options=0, $iv);
      echo "<h4 class='text-danger'>".$cookieDecrypted."</h4>";


      //Productos que están en el carro de la compra, lo sacamos de la sesión
      if (isset($_SESSION['carro']))
        $carro = $_SESSION['carro'];
      else
        $carro = array();

      //Pintar el carro de la compra
      echo '<table class="table table-hover table-secondary rounded-3 overflow-hidden">';

      //Cabecera de la tabla
      echo '  <thead>';
      echo '    <tr>';
      echo '        <th scope="col" class="col-1">#</th>';
      echo '        <th scope="col" class="col-2">Imagen</th>';
      echo '        <th scope="col" class="col-7">Nombre</th>';
      echo '        <th scope="col" class="col-2">Precio</th>';
      echo '        <th scope="col" class="col-1">Cantidad</th>';
      echo '        <th scope="col" class="col-1">Acciones</th>';
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
                    <td><a class="text-decoration-none" href="controlador.php?accion=restarCantidad&idProducto='.$linea["id"].'">-</a>'
                    .$linea["cantidad"].
                    '<a class="text-decoration-none" href="controlador.php?accion=subirCantidad&idProducto='.$linea["id"].'">+</a></td>
                    <td><a href="controlador.php?accion=borrarDelCarro&idProducto='.$linea["id"].'"><button class="btn btn-danger">X</button></a></td>
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
      echo '    <td scope="col" class="col-4" colspan="2"><span class="fw-bold">'.$totalConIva.'€</span><span class="p-3">Sin Iva: '.$totalSinIva.'€</span></td>';
      echo '  </tfoot>';

      echo '</table>';

      echo "<br>";
      if (isset($_SESSION['usuario']))
        echo "<button class='btn btn-success'>Comprar</button>";


?>


        </div>

        <br><br><br><br>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
  </body>
</html>
