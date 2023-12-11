<?php

    class VistaNoticias {

        public static function render($noticias) {
            include "cabecera.php";
            
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>#</th>";
            echo "<th scope='col'>Encabezado</th>";
            echo "<th scope='col'>Texto</th>";
            echo "<th scope='col'>Fecha</th>";
            echo "<th scope='col'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";   

            foreach($noticias as $noticia) {
                echo "<tr>";
                echo "<th scope='row'>{$noticia->getId()}</th>";
                echo "<td>{$noticia->getEncabezado()}</td>";
                echo "<td>{$noticia->getTexto()}</td>";
                echo "<td>{$noticia->getFecha()}</td>";
                echo "<td>";                
                echo "  <button type='submit' id='borrarNoticia' accion='borrarN' value='{$noticia->getId()}' class='btn btn-primary'>X</button>";
                echo "</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            include "pie.php";
        }

        public static function renderAjax($noticias) {
         
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>#</th>";
            echo "<th scope='col'>Encabezado</th>";
            echo "<th scope='col'>Texto</th>";
            echo "<th scope='col'>Fecha</th>";
            echo "<th scope='col'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";   

            foreach($noticias as $noticia) {
                echo "<tr>";
                echo "<th scope='row'>{$noticia->getId()}</th>";
                echo "<td>{$noticia->getEncabezado()}</td>";
                echo "<td>{$noticia->getTexto()}</td>";
                echo "<td>{$noticia->getFecha()}</td>";
                echo "<td>";
                
                echo "<button id='borrarNoticia' accion='borrarN' value='{$noticia->getId()}' class='btn btn-primary'>X</button>";
                
                //<a href='enrutador.php?accion=borrarN&id={$noticia->getId()}'>X
                
                echo "</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        }


    }




?>