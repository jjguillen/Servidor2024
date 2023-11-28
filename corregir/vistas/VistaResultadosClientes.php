<?php

    namespace Incidencias\vistas;

    class VistaResultadosClientes {

        public static function render($clientes) {
            
            include "cabeceraPrincipal.php";

            echo '  <div class="container">';
            echo '  <h1>LISTA DE CLIENTES</h1>';
?>

            <form action="index.php" method="post" class="mt-2">
                            
                    <div>
                        <input class="col-6 mt-3" type="text" name="dni" id="dni" placeholder="Dni / nombre" required />
                        <button type="submit" class="btn btn-primary" name="accion" value="buscarCliente"><i class="zmdi zmdi-search"></i></button>
                    </div>
                            
            </form>

<?php
            echo '  <table class="table mt-5">';
            echo '      <thead>';
            echo '          <tr>
                                <th class="col text-center">Nombre</th>
                                <th class="col text-center">Direccion</th>
                                <th class="col text-center">Localidad</th>
                                <th class="col text-center">Email</th>
                                <th class="col text-center">Movil</th>
                                <th class="col text-center">Dni</th>
                                <th class="col text-center">Añadir</th>
                            </tr>';
            echo '      </thead>';
            echo '      <tbody>';

            if (isset($clientes)) {
                foreach ($clientes as $incidencia){
                    echo '          <tr class="text-center">';
                    echo '              <td>' . $incidencia->getNombre() . '</td>';
                    echo '              <td>' . $incidencia->getDireccion() . '</td>';
                    echo '              <td>' . $incidencia->getLocalidad() . '</td>';
                    echo '              <td>' . $incidencia->getEmail() . '</td>';
                    echo '              <td>' . $incidencia->getMovil() . '</td>';
                    echo '              <td>' . $incidencia->getDni() . '</td>';
                    echo '              <td>
                    <a href="index.php?accion=añadirIncidenciaCliente&id=' . $incidencia -> getId() .'"><button class="btn btn-primary"><i class="zmdi zmdi-plus"></i></button></a></td>';
                    echo '          </tr>';
                }
            }

            echo '      </tbody>';
            echo '  </table>';
            echo '</div>';
        }
    }

?>

