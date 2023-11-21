<?php

require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

//Vendría del textarea
$texto = "Los coleccionistas de juegos retro";
$textoArticulo = "Escribe un artículo sobre " . $texto;

$response = $client->request('POST', 'https://api.openai.com/v1/chat/completions', [
  'body' => '{"model": "gpt-3.5-turbo", "temperature": 0,  "messages": [{"role": "user", "content": "'.$textoArticulo.'"}]}',
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

/*
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
*/
?>
   