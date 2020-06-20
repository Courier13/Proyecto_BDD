<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer

$user = "mike";
$pwd = 'hola2';

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
//Objeto_que_vas_a_tratar = $cliente->base->coleccion
$colección = $cliente->demo->beers;

$resultado = $colección->insertOne( [ "name" => "algo", "brewery" => "Dog1" ] );

echo "Inserted with Object ID '{$resultado->getInsertedId()}'";

?>
