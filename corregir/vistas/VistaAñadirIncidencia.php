<?php

    namespace Incidencias\vistas;
    use Incidencias\modelos\Incidencias;

    class VistaAñadirIncidencia {

        public static function render($id) {

            // INCLUIMOS LA CABECERA 
            include "CabeceraPrincipal.php";

?>
        <div class="container">
        <hr>
        <h2 class="text-primary mt-5 mb-4">AÑADIR INCIDENCIA</h2>
        <form action="index.php" method="post" class="mt-2">
        
                <div>
                    <label for="latitud">Latitud:</label><br>
                    <input class="col-6 mt-3" type="number" name="latitud" id="latitud"/>
                </div>
                <br/>
                <div>
                    <label for="longitud">Longitud:</label><br>
                    <input class="col-6 mt-3" type="number" name="longitud" id="longitud"/>
                </div>
                <br/>
                <div>
                    <label for="ciudad">Ciudad:</label><br>
                    <input class="col-6 mt-3" type="text" name="ciudad" id="ciudad" required />
                </div>
                <br/>
                <div>
                    <label for="direccion">Direccion:</label><br>
                    <input class="col-6 mt-3" type="text" name="direccion" id="direccion" required />
                </div>
                <br/>
                <div>
                    <label for="solucion">Solucion:</label><br>
                    <input class="col-6 mt-3" type="text" name="solucion" id="solucion"/>
                </div>
                <br/>
                <div>
                    <label for="estado">Estado:</label><br>
                    <select class="form col-6 text-center mt-3" name="estado" id="estado" aria-label="Default select example">
                        <option selected>Apuntado</option>
                        <option value="Comprado">En proceso</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                </div>
                <br/>
                <?php
                echo '<input type="hidden" name="id" value=" ' . $id . ' ">';
                ?>
                <div class="col-6 text-end mt-3">
                    <button type="reset" class="btn btn-primary">Resetear Formularios</button>
                    <button type="submit" class="btn btn-primary" name="accion" value="enviarAñadirIncidencia">Añadir</button>
                </div>
                
            </form>
        </div>
<?php

        }

    }



?>