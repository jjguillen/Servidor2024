<?php

    class VistaLibreria extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($algo) {
            include "cabecera.php";
         
            include "pie.php";
        }

        public function renderBusqueda() {

            if (isset($_POST['titulo'])) {
                if (strlen($_POST['titulo']) > 0) {
           
                    $uri = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($_POST['titulo']);        
                    $uri .= "&maxResults=40";
                    $reqPrefs['http']['method'] = 'GET';
                    $reqPrefs['http']['header'] = 'X-Auth-Token: ';
                    $stream_context = stream_context_create($reqPrefs);
                    $resultado = file_get_contents($uri, false, $stream_context);


                    //Pasar de json a objeto php y recorrer los resultados
                    if ($resultado != false) {
                        $respPHP = json_decode($resultado);
                        
                        
                        echo "<div class='row mt-4'>";
        
                        foreach($respPHP->items as $book) {
                            
                            if (isset($book->volumeInfo->imageLinks->smallThumbnail)) {
                                echo "<div class='card m-2' style='width: 18rem;'>";
                                echo "    <img src='{$book->volumeInfo->imageLinks->smallThumbnail}' class='card-img-top' alt='...'>";
                                echo "    <div class='card-body'>";
                                echo "        <h5 class='card-title'>{$book->volumeInfo->title}</h5>";
                                echo "        <p class='card-text'>";
                                $autores="";
                                foreach ($book->volumeInfo->authors as $autor) {
                                    echo $autor."<br>";
                                    $autores .= $autor;
                                }
                                echo "</p>";
                                if (isset($book->volumeInfo->industryIdentifiers)) {
                                    echo "<h6>ISBN: {$book->volumeInfo->industryIdentifiers[0]->identifier}</h6>";
                                }  
                                if (isset($book->volumeInfo->pageCount)) {
                                    echo "<h6>Nº pags: {$book->volumeInfo->pageCount}</h6>";                   
                                }
                                $readLink="";
                                if (isset($book->accessInfo->webReaderLink))  {   
                                    if ($book->accessInfo->accessViewStatus != "NONE") {
                                        echo "        <a href='{$book->accessInfo->webReaderLink}' class='btn btn-primary'>Leer libro</a>";
                                        $readLink = $book->accessInfo->webReaderLink;
                                    }
                                }
                                echo "<form id='formFavorito'>";
                                echo "  <input type='hidden' name='id' value='{$book->id}'>";
                                echo "  <input type='hidden' name='titulo' value='{$book->volumeInfo->title}'>";
                                echo "  <input type='hidden' name='imagen'  value='{$book->volumeInfo->imageLinks->smallThumbnail}'>";
                                echo "  <input type='hidden' name='autor'  value='{$autores}'>";
                                echo "  <input type='hidden' name='readLink'  value='{$readLink}'>";
                        
                                echo "  <button class='btn btn-success m-2'>+ Favoritos</button>";
                                echo "</form>";

                                echo "    </div>";
                                echo "</div>";
            
                            }
                        }
        
                        echo "</div>";
        
        
                    }    
                }   
            }            
        }

        public function renderFavoritos($favoritos) {
          
            echo "<div class='row mt-4'>";

            echo "<h2>Mis favoritos</h2>";
            foreach($favoritos as $favorito) {
                
                    echo "<div class='card m-2' style='width: 18rem;'>";
                    echo "    <img src='{$favorito->getImagen()}' class='card-img-top' alt='...'>";
                    echo "    <div class='card-body'>";
                    echo "        <h5 class='card-title'>{$favorito->getTitulo()}</h5>";
                    echo "        <p class='card-text'>";
                    echo $favorito->getAutor()."<br>";
                    echo "</p>";   
                    echo "        <a href='{$favorito->getReadLink()}' class='btn btn-primary'>Leer libro</a>";                                          
                    echo "        <button class='btn btn-danger' accion='borrarFavorito' id='{$favorito->getId()}'>Borrar</button>";
                    echo "    </div>";
                    echo "</div>";


            }

            echo "</div>";
    
        }




    }




?>