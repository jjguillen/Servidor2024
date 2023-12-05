<?php

namespace Comentarios\vistas;

class VistaAPIDetallePelis
{

  public static function render($respObj, $comentarios)
  {

    echo '
            <div class="col-md-10">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">' . $respObj->genres[0]->name . '</strong>
                <h3 class="mb-0">' . $respObj->title . '</h3>
                <div class="mb-1 text-muted">' . $respObj->release_date . '</div>
                <div class="mb-1">
                    <p class="card-text mb-auto">' . $respObj->overview . '</p>
                    <a href="' . $respObj->homepage . '" class="link">Web original</a>
                </div>
                <div class="mb-1 mt-2">
                    <h5 class="card-text mb-auto">Comentarios
                    <a type="button" data-bs-toggle="modal" data-bs-target="#nuevoComentario">
                        <i class="zmdi zmdi-plus"></i>
                    </a>
                    </h5>
                ';

    echo "<ol class='mt-2 list-group list-group-numbered'>";
    foreach ($comentarios as $comentario) {
      echo "<li class='list-group-item d-flex justify-content-between align-items-start mt-3'>";
      echo "<div class='ms-2 me-auto'>
                        <div class='fw-bold'>" . $comentario->getNick() . "</div>
                        " . $comentario->getComentario() . "
                  </div>
                  <span class='badge bg-primary rounded-pill'>" . $comentario->getNota() . "</span>";
      echo "</li>";
    }
    echo "</ol>";

    echo '

                </div>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="https://image.tmdb.org/t/p/w500' . $respObj->poster_path . '" class="card-img-top" >
                        
              </div>
            </div>
          </div>
          ';

    echo '
        <!-- Modal -->
        <div class="modal fade" id="nuevoComentario" tabindex="-1" aria-labelledby="nuevoComentarioLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="nuevoComentarioLabel">Nuevo Comentario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
        
              <form id="formNuevoComentario">
                <div class="mb-3">
                  <label for="nick" class="form-label">Nick</label>
                  <input type="text" class="form-control" id="nick" name="nick">
                </div>
                <div class="mb-3">
                  <label for="comentario" class="form-label">Comentario</label>
                  <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="nota" class="form-label">Nota</label>
                  <input type="number" min="1" max="10" class="form-control" id="nota" name="nota">
                </div>
                <input type="hidden" name="idPeli" value="' . $respObj->id . '"/>
              </form>
        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" tipo="nuevoComentario">Guardar</button>
              </div>
            </div>
          </div>
        </div>        
        ';
  }
}
