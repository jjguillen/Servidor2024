<?php

namespace Amigo\vistas;




class VistaAmigos{


    public static function render($amigos){

        include "cabecera.php";



        echo '  <div class="container">';
        echo '  <a href="index.php?accion=añadiramigo"><button type="button" class="btn btn-warning mt-2 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo Amigo Invisible</button></a>';
        echo '  <h1>Lista Amigos-Invisibles</h1>';
?>

        <form action="index.php" method="post" class="mt-2">
                        
                <div>
                    <input class="col-3 mt-3" type="text" name="amigo" id="amigo" placeholder="Buscar Amigo" required />
                    <button type="submit" class="btn btn-warning pt-2" name="accion" value="buscaramigo">Buscar</button>
                </div>
                        
        </form>

<?php
        echo '  <table class="table mt-5">';
        echo '      <thead>';
        echo '          <tr>
                            <th class="col text-center">Nombre</th>
                            <th class="col text-center">Estado</th>
                            <th class="col text-center">Max_dinero</th>
                            <th class="col text-center">Fecha_tope</th>
                            <th class="col text-center">Lugar</th>
                            <th class="col text-center">Observaciones</th>
                            <th class="col text-center">Emoji</th>
                            <th class="col text-center">Opciones</th>
                        </tr>';
        echo '      </thead>';
        echo '      <tbody>';

        if (isset($amigos)) {
            foreach ($amigos as $amigo){
                echo '          <tr class="text-center">';
                echo '              <td>' . $amigo->getNombre() . '</td>';
                echo '              <td>' . $amigo->getEstado() . '</td>';
                echo '              <td>' . $amigo->getMaxDinero() . '</td>';
                echo '              <td>' . $amigo->getFechaTope() . '</td>';
                echo '              <td>' . $amigo->getLugar() . '</td>';
                echo '              <td>' . $amigo->getObservaciones() . '</td>';
                echo '              <td>' . $amigo->getEmoji() . '</td>';
                echo '              <td>
                
                <a href="index.php?accion=borrarA&id=' . $amigo -> getId() .'"><button class="btn btn-danger">X</button></a>
                <a href="index.php?accion=modificarA&id=' . $amigo -> getId() .'"><button class="btn btn-primary">Editar</button></a>
                <a href="index.php?accion=miembros&id=' . $amigo -> getId() .'"><button class="btn btn-warning">Miembros</button></a>
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