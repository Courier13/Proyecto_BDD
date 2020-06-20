<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer

$user = "mike";
$pwd = 'hola2';

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
//Objeto_que_vas_a_tratar = $cliente->base->coleccion
$colección = $cliente->demo->beers;
$mongoId = "5edfecb9a3172323017862f2";
//$query = ["_id" => new MongoDB\BSON\ObjectId($mongoId)];
$target = "algo";
$query = ["name" => 'algo'];
$resultado = $colección->find( );

foreach ($resultado as $entry) {
  $_id = $entry['_id'];
  $nombre = $entry['name'];
  $test = $entry['brewery'];

  echo "Id: " . $_id . " nombre: " . $nombre . " test: " . $test .  "<br />";
}
?>
