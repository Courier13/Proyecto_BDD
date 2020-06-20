<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer

$user = "mike";
$pwd = 'hola2';

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
//Objeto_que_vas_a_tratar = $cliente->base->coleccion
$colección = $cliente->demo->beers;

$mongoId = "5edfecb9a3172323017862f2";
$query = ["_id" => new MongoDB\BSON\ObjectId($mongoId)];
$update = ['$set' => ["name" => "yo"]];
$options = [""];

$resultado = $colección->updateOne( $query, $update );

echo $resultado->getMatchedCount();

//echo "Inserted with Object ID '{$resultado->getInsertedId()}'";

?>
