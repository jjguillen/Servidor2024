<?php

    namespace Examen\vistas;

    class VistaAIDetalle {

        public static function render($regalo, $participantes) {
            
            include "cabeceraPrincipal.php";

            echo '  <div class="container">';
            echo '  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addParticipante">
                    Añadir Participante</button>';
            echo '  <h2>LISTA DE PARTICIPANTES DEL AMIGO INVISIBLE '.$regalo->getNombre().'</h2>';
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

            echo '<p><span class="me-1">'.$regalo->getEmoji().'</span>
            <span class="me-1">'.$regalo->getNombre().'</span>
            <span class="me-1">'.$regalo->getEstado().'</span>
            <span class="me-1">'.$regalo->getMax_dinero().'€</span>
            <span class="me-1">'.$regalo->getFecha_tope().'</span>
            <span class="me-1">'.$regalo->getLugar().'</span>
            </p>';

            echo '  <table class="table mt-5">';
            echo '      <thead>';
            echo '          <tr>
                                <th class="col text-center">Nombre</th>
                                <th class="col text-center">Email</th>
                                <th class="col text-center">Telefono</th>
                                <th class="col text-center">Estado</th>
                                <th class="col text-center">Observaciones</th>
                            </tr>';
            echo '      </thead>';
            echo '      <tbody>';

            if (isset($participantes)) {
                foreach ($participantes as $participante){
                    echo '          <tr class="text-center">';
                    echo '              <td>' . $participante->getNombre() . '</td>';
                    echo '              <td>' . $participante->getEmail() . '</td>';
                    echo '              <td>' . $participante->getTelefono() . '</td>';
                    echo '              <td>' . $participante->estado . '</td>';
                    echo '              <td>
                    <a href="index.php?accion=borrarParticipante&idP=' . $participante -> getId() .'&idAI='.$regalo->getId().'"><button class="btn btn-danger"><i class="zmdi zmdi-delete"></i></button></a>
                    <a href="index.php?accion="><button class="btn btn-warning"><i class="zmdi zmdi-odnoklassniki"></i></button></a>
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

