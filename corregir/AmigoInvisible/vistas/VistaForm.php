<?php

namespace Amigo\vistas;

class VistaForm{

    public static function form($amigo){

    include "cabecera.php";

    echo "
    <div class='container-fluid px-5'>
    <h1 class='mt-4'>Modificar Amigo</h1>";

?>



<form id="formAmigo" action="index.php" method="post">
          
          <div class="row g-3 align-items-center mb-2">
              <div class="col-4">
                  <label for="nombre" class="col-form-label ps-5">Nombre</label>
              </div>
              <div class="col-5">
                  <input type="text" id="nombre" name="nombre" value="<?=$amigo->getNombre()?>" class="form-control " required>
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
           <div class="col-4">
                  <label for="estado" class="col-form-label ps-5">Estado</label>
              </div>
              <div class="col-5">
                  <select  id="estado" name="estado" value="<?=$amigo->getEstado()?>">
                      <option value="Activo" <?= ($amigo->getEstado() == 'activo') ? 'selected' : '' ?>>Activo</option>
                      <option value="Comprado" <?= ($amigo->getEstado() == 'comprado') ? 'selected' : '' ?>>Comprado</option>
                      <option value="Entregado" <?= ($amigo->getEstado() == 'entregado') ? 'selected' : '' ?>>Entregado</option>
        
                  </select>
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
              <div class="col-4">
                  <label for="max_dinero" class="col-form-label ps-5">Max Dinero</label>
              </div>
              <div class="col-5">
                  <input type="number" id="max_dinero" name="max_dinero" value="<?=$amigo->getMaxDinero()?>"class="form-control" >
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
             <div class="col-4">
                  <label for="fecha_tope" class="col-form-label ps-5">Fecha Tope</label>
              </div>
              <div class="col-5">
                  <input type="date" id="fecha_tope" name="fecha_tope" value="<?=$amigo->getFechaTope()?>" class="form-control " >
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
             <div class="col-4">
                  <label for="lugar" class="col-form-label ps-5">Lugar</label>
              </div>
              <div class="col-5">
                  <input type="text" id="lugar" name="lugar" value="<?=$amigo->getLugar()?>" class="form-control " >
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
             <div class="col-4">
                  <label for="observaciones" class="col-form-label ps-5">Observaciones</label>
              </div>
              <div class="col-5">
                  <input type="text" id="observaciones" name="observaciones" value="<?=$amigo->getObservaciones()?>" class="form-control " >
              </div>
          </div>
             <input type="hidden" name="id" value="<?=$amigo->getId()?>">
          
          <div class="ms-5 ps-5 mt-4 row w-25 float-none">
            <button class='btn btn-success' type="submit" name="accion" value="formModificar">Modificar</button>
         </div>
      </form>       

        

<?php

    echo"</div>";
    echo"<br>";


}

    public static function formAdd(){
    include "cabecera.php";

    echo "
    <div class='container-fluid px-5'>
    <h1 class='mt-4'>Añadir Amigo</h1>";

    ?>



<form id="formAmigo" action="index.php" method="post">
          
          <div class="row g-3 align-items-center mb-2">
              <div class="col-4">
                  <label for="nombre" class="col-form-label ps-5">Nombre</label>
              </div>
              <div class="col-5">
                  <input type="text" id="nombre" name="nombre" value="" class="form-control " >
              </div>
          </div>
          
          <div class="row g-3 align-items-center mb-2">
              <div class="col-4">
                  <label for="max_dinero" class="col-form-label ps-5">Max Dinero</label>
              </div>
              <div class="col-5">
                  <input type="number" id="max_dinero" name="max_dinero" value=""class="form-control" >
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
             <div class="col-4">
                  <label for="fecha_tope" class="col-form-label ps-5">Fecha Tope</label>
              </div>
              <div class="col-5">
                  <input type="date" id="fecha_tope" name="fecha_tope" value="" class="form-control " >
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
             <div class="col-4">
                  <label for="lugar" class="col-form-label ps-5">Lugar</label>
              </div>
              <div class="col-5">
                  <input type="text" id="lugar" name="lugar" value="" class="form-control " >
              </div>
          </div>
          <div class="row g-3 align-items-center mb-2">
             <div class="col-4">
                  <label for="observaciones" class="col-form-label ps-5">Observaciones</label>
              </div>
              <div class="col-5">
                  <input type="text" id="observaciones" name="observaciones" value="" class="form-control " >
              </div>
          </div>
            
          
          <div class="ms-5 ps-5 mt-4 row w-25 float-none">
            <button class='btn btn-success' type="submit" name="accion" value="addAmigo">Añadir</button>
         </div>
      </form>       

        

<?php

    echo"</div>";
    echo"<br>";
}
}

?>
