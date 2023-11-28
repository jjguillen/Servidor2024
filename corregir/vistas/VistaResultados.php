<?php

    namespace Incidencias\vistas;

    class VistaResultados {

        public static function render($incidencias) {
            
            include "cabeceraPrincipal.php";

            echo '  <div class="container">';
            echo '  <a href="index.php?accion=añadirIncidencia"><button type="button" class="btn btn-primary mt-2 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Añadir Incidencia</button></a>';
            echo '  <h1>LISTA DE INCIDENCIAS</h1>';
?>

            <form action="index.php" method="post" class="mt-2">
                            
                    <div>
                        <input class="col-6 mt-3" type="text" name="incidencia" id="incidencia" placeholder="Ciudad / Estado" required />
                        <button type="submit" class="btn btn-primary" name="accion" value="buscarIncidencia"><i class="zmdi zmdi-search"></i></button>
                    </div>
                            
            </form>

<?php
            echo '  <table class="table mt-5">';
            echo '      <thead>';
            echo '          <tr>
                                <th class="col text-center">Latitud</th>
                                <th class="col text-center">Longitud</th>
                                <th class="col text-center">Ciudad</th>
                                <th class="col text-center">Direccion</th>
                                <th class="col text-center">Solucion</th>
                                <th class="col text-center">Estado</th>
                                <th class="col text-center">Opciones</th>
                            </tr>';
            echo '      </thead>';
            echo '      <tbody>';

            if (isset($incidencias)) {
                foreach ($incidencias as $incidencia){
                    echo '          <tr class="text-center">';
                    echo '              <td>' . $incidencia->getLatitud() . '</td>';
                    echo '              <td>' . $incidencia->getLongitud() . '</td>';
                    echo '              <td>' . $incidencia->getciudad() . '</td>';
                    echo '              <td>' . $incidencia->getDireccion() . '</td>';
                    echo '              <td>' . $incidencia->getSolucion() . '</td>';
                    echo '              <td>' . $incidencia->getEstado() . '</td>';
                    echo '              <td>
                    <a href="index.php?accion=editarIndicencia&id=' . $incidencia -> getId() .'"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i></button></a>
                    <a href="index.php?accion=eliminarIncidencia&id=' . $incidencia -> getId() .'"><button class="btn btn-danger"><i class="zmdi zmdi-delete"></i></button></a>
                    </td>';
                    echo '          </tr>';
                }
            }

            echo '      </tbody>';
            echo '  </table>';
            echo '</div>';
        }
    }

?>

