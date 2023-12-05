<?php

namespace Comentarios\vistas;

class VistaAPIPelis
{

    public static function render($respObj, $page, $genero)
    {

        //Paginador
        echo '<nav aria-label="Page navigation example">
            <ul class="pagination">
              <li id="prev" class="page-item" genero="' . $genero . '" value="' . (intval($page) - 1) . '"><a class="page-link" href="#">Previous</a></li>
              <li id="next" class="page-item" genero="' . $genero . '" value="' . (intval($page) + 1) . '"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>';


        //Pelis
        echo "<div class='d-flex flex-wrap'>";

        foreach ($respObj->results as $peli) {


            echo "
                    <div class='card m-1' style='width: 18rem;'>
                        <img src='https://image.tmdb.org/t/p/w500" . $peli->poster_path . "' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $peli->title . "</h5>
                            <p class='card-text'>" . $peli->overview . "</p>
                            <a href='#' tipo='detallePeli' idPeli='" . $peli->id . "' class='btn btn-primary'>Detalle</a>
                        </div>
                    </div>

                ";
        }

        echo "</div>";
    }
}
