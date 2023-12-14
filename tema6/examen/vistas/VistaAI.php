<?php

    namespace Examen\vistas;

    class VistaAI {

        public static function render($regalos) {
            
            include "cabeceraPrincipal.php";

            echo '  <div class="container">';
            echo '  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAI">
                    Añadir Regalo Amigo Invisible</button>';
            echo '  <h1>LISTA DE AMIGOS INVISIBLES</h1>';
?>
<!--
            <form action="index.php" method="post" class="mt-2">
                            
                    <div>
                        <input class="col-6 mt-3" type="text" name="incidencia" id="incidencia" placeholder="Ciudad / Estado" required />
                        <button type="submit" class="btn btn-primary" name="accion" value="buscarIncidencia"><i class="zmdi zmdi-search"></i></button>
                    </div>
                            
            </form>
-->
<?php
            echo '  <table class="table mt-5">';
            echo '      <thead>';
            echo '          <tr>
                                <th class="col text-center">Nombre</th>
                                <th class="col text-center">Estado</th>
                                <th class="col text-center">MaxDinero</th>
                                <th class="col text-center">Fecha</th>
                                <th class="col text-center">Lugar</th>
                                <th class="col text-center">Observaciones</th>
                                <th class="col text-center">Emoji</th>
                            </tr>';
            echo '      </thead>';
            echo '      <tbody>';

            if (isset($regalos)) {
                foreach ($regalos as $ai){
                    echo '          <tr class="text-center">';
                    echo '              <td>' . $ai->getNombre() . '</td>';
                    echo '              <td>' . $ai->getEstado() . '</td>';
                    echo '              <td>' . $ai->getMax_dinero() . '</td>';
                    echo '              <td>' . $ai->getFecha_tope() . '</td>';
                    echo '              <td>' . $ai->getObservaciones() . '</td>';
                    echo '              <td>' . $ai->getEmoji() . '</td>';
                    echo '              <td>
                    <a href="index.php?accion=editarAI&id=' . $ai -> getId() .'"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i></button></a>
                    <a href="index.php?accion=eliminarAI&id=' . $ai -> getId() .'"><button class="btn btn-danger"><i class="zmdi zmdi-delete"></i></button></a>
                    <a href="index.php?accion=verParticipantes&id=' . $ai -> getId() .'"><button class="btn btn-warning"><i class="zmdi zmdi-odnoklassniki"></i></button></a>
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

