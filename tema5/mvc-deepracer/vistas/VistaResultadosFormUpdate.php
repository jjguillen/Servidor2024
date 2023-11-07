<?php
    namespace DeepRacer\vistas;

    class VistaResultadosFormUpdate {

        public static function render($resultado) {

            include "cabeceraPrincipal.php";
            
            echo "<div class='container'>";
?>
  
  <form class="w-75" action="index.php" method="post">
    <div class="mb-3 row">
        <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $resultado->getModelo() ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="pista" class="col-sm-2 col-form-label">Pista</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="pista" name="pista" value="<?= $resultado->getPista() ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tiempo" class="col-sm-2 col-form-label">Tiempo</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="tiempo" name="tiempo" min="1" max="500" value="<?= $resultado->getTiempo() ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="colisiones" class="col-sm-2 col-form-label">Colisiones</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="colisiones" name="colisiones" min="0" max="50" value="<?= $resultado->getColisiones() ?>">
        </div>
    </div>
    <input type="hidden" name="id" value="<?= $resultado->getId() ?>">
    <div class="mb-3 row w-25 float-end">
        <button class='btn btn-success' type="submit" name="accion" value="recibirFormModificarResultado">Modificar</button>
    </div>
  </form>
            
            
<?php
            echo "</div>";

            include "piePrincipal.php";

        }


    }