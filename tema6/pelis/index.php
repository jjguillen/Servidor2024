<?php
    namespace Comentarios;

    require_once './vendor/autoload.php';

    use Comentarios\controladores\ControladorComentarios;
    use Comentarios\controladores\ControladorDeepRacer;
    use Comentarios\vistas\VistaAPIPelis;
    use Comentarios\vistas\VistaAPIDetallePelis;
    use Comentarios\modelos\Comentario;
    use Comentarios\modelos\ModeloComentarios;

    //Autocargar las clases --------------------------
    spl_autoload_register(function ($class) {
        //echo substr($class, strpos($class,"\\")+1);
        $ruta = substr($class, strpos($class,"\\")+1);
        $ruta = str_replace("\\", "/", $ruta);
        include_once "./" . $ruta . ".php"; 
    });
    //Fin Autcargar ----------------------------------

    function peticionHTTPGenero($genero, $pagina) {
        //require_once('vendor/autoload.php');

        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page='.$pagina.'&sort_by=popularity.desc&with_genres='.$genero, [
          'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJhNzRjMTIyYjIyODA3YTc2Yjc2MzdhYzE0MDdhMDQ1ZSIsInN1YiI6IjVjNDYwZGM1YzNhMzY4NDc4OTgzOTk4NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TaZmdoU2ddpuvzch2srxQGa3w2C636Xq-X6Bzc1uN6U',
            'accept' => 'application/json',
          ],
        ]);

        $responseObject = json_decode($response->getBody());
        return $responseObject;
    }

    function peticionHTTPDetallePeli($id) {
        //require_once('vendor/autoload.php');

        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/'.$id.'?language=en-US', [
          'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJhNzRjMTIyYjIyODA3YTc2Yjc2MzdhYzE0MDdhMDQ1ZSIsInN1YiI6IjVjNDYwZGM1YzNhMzY4NDc4OTgzOTk4NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TaZmdoU2ddpuvzch2srxQGa3w2C636Xq-X6Bzc1uN6U',
            'accept' => 'application/json',
          ],
        ]);

        $responseObject = json_decode($response->getBody());
        return $responseObject;
    }

    if (isset($_REQUEST)) {
        //Tratamiento de botones, forms, ...
        if (isset($_REQUEST["accion"])) {
            if (strcmp($_REQUEST["accion"],"llamarAPI") == 0) {
                $respObj = peticionHTTPGenero($_REQUEST["genero"],$_REQUEST["page"]);
                VistaAPIPelis::render($respObj,$_REQUEST["page"],$_REQUEST["genero"]);
            }
            if (strcmp($_REQUEST["accion"],"detallePeli") == 0) {
                $idPeli = $_REQUEST["id"];
                $respObj = peticionHTTPDetallePeli($idPeli);

                ControladorComentarios::mostrarComentarios($respObj);
            }

            if (strcmp($_REQUEST["accion"],"nuevoComentario") == 0) {
                $idPeli = $_REQUEST["idPeli"];
                $nick = $_REQUEST["nick"];
                $comentario = $_REQUEST["comentario"];
                $nota = $_REQUEST["nota"];

                $comentObj = new Comentario(1, $idPeli, $nick, $comentario, $nota);
                ControladorComentarios::nuevoComentario($comentObj);

                //Repintar la peli en detalle y con el nuevo comentario
                $respObj = peticionHTTPDetallePeli($idPeli);
                ControladorComentarios::mostrarComentarios($respObj);

            }


        } else {
            //Mostrar inicio
            ControladorComentarios::mostrarInicio();
        }
    }





?>