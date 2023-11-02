<?php
    namespace DeepRacer\vistas;

    class VistaResultados {

        public static function render($resultados) {

            include "cabeceraPrincipal.php";
            
            echo "<div class='container'>";
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
    
            foreach($resultados as $resultado) {
                echo "<tr>";
                echo " <td>".$resultado->getModelo()."</td>";
                echo " <td>".$resultado->getPista()."</td>";
                echo " <td>".$resultado->getTiempoVuelta()."</td>";
                echo " <td>".$resultado->getNumeroColisiones()."</td>";
                echo "<td>";
                echo "<a href='index.php?accion=eliminarResultado&id=".$resultado->getId()."'><button class='btn btn-danger'>X</button>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>
            </table>";

            echo "</div>";

            include "piePrincipal.php";

        }


    }