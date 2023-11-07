<?php
    namespace DeepRacer\vistas;

    class VistaIntentosForm {

        public static function render($idResultado) {

            include "cabeceraPrincipal.php";
            
            echo "<div class='container'>";
?>
  
  <h3>Nuevo Intento</h3>
  <form class="w-75" action="index.php" method="post">
    <div class="mb-3 row">
        <label for="modelo" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="pista" class="col-sm-2 col-form-label">Pista</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="pista" name="pista">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tiempo" class="col-sm-2 col-form-label">Tiempo</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="tiempo" name="tiempo" min="1" max="500">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="colisiones" class="col-sm-2 col-form-label">Colisiones</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="colisiones" name="colisiones" min="0" max="50">
        </div>
    </div>
    <input type="hidden" name="idResultado" value="<?= $idResultado ?>">
    <div class="mb-3 row w-25 float-end">
        <button class='btn btn-success' type="submit" name="accion" value="recibirFormNuevoIntento">Crear</button>
    </div>
  </form>
            
            
<?php
            echo "</div>";

            include "piePrincipal.php";

        }


    }