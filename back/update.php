<?php
session_start();

require '../pass.php';

$targetName = $_POST['namae'];
$targetClass = $_POST['clase'];

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->demo->beers;

$query = ["name" => $targetName];
$update = ['$set' => ["brewery" => $targetClass]];
$busqueda = $colección->updateOne( $query, $update );


$_SESSION["insercion"] = true;
//$_SESSION["resultado"] = $busqueda->getInsertedId()

header("Location: ../../front/query/update.php");

?>
