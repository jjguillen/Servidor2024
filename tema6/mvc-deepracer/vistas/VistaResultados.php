<?php
    namespace DeepRacer\vistas;

    class VistaResultados {

        public static function render($resultados) {

            include "cabeceraPrincipal.php";
            
            

            echo "<div class='container'>";

            echo '
            <main class="d-flex flex-wrap">
            <p>
                <a href="index.php?accion=mostrarFormNuevoResultado" class="nav-link px-2 link-secondary"><button class="btn btn-primary">Nuevo Resultado</button></a>
            </p>
            </main>';
            
            echo "
            
            <table class='table table-dark'>
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Pista</th>
                        <th>Tiempo</th>
                        <th>Colisiones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
            //$resultado ahora es un objeto
            foreach($resultados as $resultado) {
                echo "<tr>";
                echo " <td>".$resultado->getModelo()."</td>";
                echo " <td>".$resultado->getPista()."</td>";
                echo " <td>".$resultado->getTiempo()."</td>";
                echo " <td>".$resultado->getColisiones()."</td>";
                echo "<td>";
                echo "<a href='index.php?accion=eliminarResultado&id=".$resultado->getId()."'><button class='btn btn-danger'>X</button>";
                echo "<a href='index.php?accion=modificarResultadoForm&id=".$resultado->getId()."'><button class='btn btn-warning ms-1'>@</button>";
                echo "<a href='index.php?accion=verIntentos&id=".$resultado->getId()."'><button class='btn btn-success ms-1'>Intentos</button>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>
            </table>";

            echo "</div>";

            include "piePrincipal.php";

        }


    }