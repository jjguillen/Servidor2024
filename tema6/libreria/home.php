<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <h2>Mi librería</h2>

    <form class="col-4" action="home.php" method="get">
        <div class="mb-3">
            <label for="exampleInputSearch" class="form-label">Título libro</label>
            <input type="text" class="form-control" id="exampleInputSearch" name="titulo">
        </div>        
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>



    <?php

        if (isset($_GET['titulo'])) {
           
            $uri = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($_GET['titulo']);        
            $reqPrefs['http']['method'] = 'GET';
            $reqPrefs['http']['header'] = 'X-Auth-Token: ';
            $stream_context = stream_context_create($reqPrefs);
            $resultado = file_get_contents($uri, false, $stream_context);
            
            //Pasar de json a objeto php y recorrer los resultados
            if ($resultado != false) {
                $respPHP = json_decode($resultado);
                
                echo "<div class='container'>";
                echo "<div class='row'>";

                foreach($respPHP->items as $book) {
                    
                    if (isset($book->volumeInfo->imageLinks->smallThumbnail)) {
                        echo "<div class='card m-2' style='width: 18rem;'>";
                        echo "    <img src='{$book->volumeInfo->imageLinks->smallThumbnail}' class='card-img-top' alt='...'>";
                        echo "    <div class='card-body'>";
                        echo "        <h5 class='card-title'>{$book->volumeInfo->title}</h5>";
                        echo "        <p class='card-text'>";
                        foreach ($book->volumeInfo->authors as $autor) {
                            echo $autor."<br>";
                        }
                        echo "</p>";
                        if (isset($book->volumeInfo->industryIdentifiers)) {
                            echo "<h6>ISBN: {$book->volumeInfo->industryIdentifiers[0]->identifier}</h6>";
                        }  
                        if (isset($book->volumeInfo->pageCount)) {
                            echo "<h6>Nº pags: {$book->volumeInfo->pageCount}</h6>";                   
                        }
                        if (isset($book->accessInfo->webReaderLink))  {   
                            if ($book->accessInfo->accessViewStatus != "NONE")                   
                                echo "        <a href='{$book->accessInfo->webReaderLink}' class='btn btn-primary'>Leer libro</a>";
                        }
                        echo "    </div>";
                        echo "</div>";
    
                    }
                }

                echo "</div></div>";


            }    


        }



    ?>


</div>



</body>
</html>