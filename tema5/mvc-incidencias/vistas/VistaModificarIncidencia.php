<?php

    namespace Incidencias\vistas;

    class VistaModificarIncidencia{

        public static function render($incidencia) {

           // INCLUIMOS LA CABECERA 
           include "cabeceraPrincipal.php";

           $valor = $incidencia;


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
    <?php

            $estados = array("Apuntado", "Pendiente", "Finalizado");
            foreach($estados as $estado) {
                if (strcmp($valor->getEstado(),$estado) == 0) {
                    echo '<option value="'.$estado.'" selected>'.$estado.'</option>';
                } else {
                    echo '<option value="'.$estado.'">'.$estado.'</option>';
                }
            }
                                 

    ?>
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


?>