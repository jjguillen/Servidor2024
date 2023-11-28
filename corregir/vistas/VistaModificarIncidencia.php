<?php

    namespace Incidencias\vistas;

    class VistaModificarIncidencia{

        public static function render($incidencia) {

           // INCLUIMOS LA CABECERA 
           include "CabeceraPrincipal.php";

           foreach($incidencia as $valor) {


?>
                   <div class="container">
                   <hr>
                   <a href="index.php?accion=mostrarLogIn"><button type="submit" class="btn btn-primary mt-2"><- Volver Atrás</button></a>
                   <h2 class="text-primary mt-3 mb-4">MODIFICAR INCIDENCIAS</h2>
                    <br>
                    <p>Latitud : <?= $valor->getLatitud() ?></p>
                    <p>Longitud : <?= $valor->getLongitud() ?></p>
                    <p>Ciudad : <?= $valor->getCiudad() ?></p>
                    <p>Direccion : <?= $valor->getDireccion() ?></p>

                    <form action="index.php" method="post" class="mt-2">
                   
                           <div>
                               <label for="solucion">Solucion: </label>
                               <input class="col-6 mt-3" type="text" name="solucion" id="solucion" value="<?= $valor->getSolucion() ?>" required />
                           </div>
                           <br/>
                           <div>
                                <label for="destinatario">Estado:</label>
                                <select class="form col-6 text-center mt-3" name="estado" id="estado" aria-label="Default select example">
                                    <option value="<?= $valor->getEstado() ?>"><?= $valor->getEstado() ?></option>
                                    <option value="Apuntado">Apuntado</option>
                                    <option value="pendiente">En Proceso</option>
                                    <option value="Finalizado">Finalizado</option>
                                </select>
                           </div>
<?php

                           echo '<input type="hidden" name="id" value="' . $valor -> getId() . '">';
                           
?>
                            <div class="col-6 text-end mt-3">
                                <button type="submit" class="btn btn-primary" name="accion" value="enviarModificarIncidencia">Enviar</button>
                            </div>
                           
                       </form>
                   </div>
<?php
           }  
        }

    }


?>