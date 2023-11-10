<?php

require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

//Vendría del textarea
$texto = "Los coleccionistas de juegos retro";
$textoArticulo = "Escribe un artículo sobre " . $texto;

$response = $client->request('POST', 'https://api.openai.com/v1/completions', [
  'body' => '{"model": "text-davinci-003", "prompt": "'.$textoArticulo.'", "temperature": 0, "max_tokens": 1000, "n": 1}',
  'headers' => [
    'Authorization' => 'Bearer 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',
    'accept' => 'application/json',
    'content-type' => 'application/json',
  ],
]);

$respuesta = $response->getBody();

$respuestaJSON = json_decode($respuesta);

echo $respuestaJSON->choices[0]->text;
echo "<br>";

$textoImagen = $texto;
$response = $client->request('POST', 'https://api.openai.com/v1/images/generations', [
  'body' => '{"prompt": "'.$textoImagen.'", "size": "1024x1024", "n": 1}',
  'headers' => [
    'Authorization' => 'Bearer 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',
    'accept' => 'application/json',
    'content-type' => 'application/json',
  ],
]);

$respuesta = $response->getBody();

$respuestaJSON = json_decode($respuesta);

echo $respuestaJSON->data[0]->url;

echo "<a href='pruebaConexion.php?imagen=".urlencode($respuestaJSON->data[0]->url)."'>Imagen</a>";

?>
   