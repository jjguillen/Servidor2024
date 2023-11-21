<?php
    namespace DeepRacer\vistas;

    class VistaIntentos {

        public static function render($intentos, $idResultado) {

            include "cabeceraPrincipal.php";
            
            echo "<div class='container'>";

            echo '
            <main class="d-flex flex-wrap">
            <p>
                <a href="index.php?accion=mostrarFormNuevoIntento&idResultado='.$idResultado.'" class="nav-link px-2 link-secondary"><button class="btn btn-primary">Nuevo Intento</button></a>
            </p>
            </main>';

            echo "
            
            <table class='table table-light'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Pista</th>
                        <th>Tiempo</th>
                        <th>Colisiones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
            //$intento ahora es un objeto
            foreach($intentos as $intento) {
                echo "<tr>";
                echo " <td>".$intento->getNombre()."</td>";
                echo " <td>".$intento->getPista()."</td>";
                echo " <td>".$intento->getTiempo()."</td>";
                echo " <td>".$intento->getColisiones()."</td>";
                echo "<td>";
                echo "<a href='index.php?accion=eliminarIntento&id=".$intento->getId()."&idResultado=".$idResultado."'><button class='btn btn-danger'>X</button>";
            
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>
            </table>";

            echo "</div>";

            include "piePrincipal.php";

        }


    }