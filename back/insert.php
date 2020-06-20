<?php
session_start();

require '../pass.php';

$targetName = $_POST['namae'];
$targetClass = $_POST['clase'];

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->demo->beers;

$query = ["name" => $targetName, "brewery" => $targetClass];
$busqueda = $colección->insertOne( $query );


$_SESSION["insercion"] = true;
//$_SESSION["resultado"] = $busqueda->getInsertedId()

header("Location: ../../front/query/insrtProd.php");

?>
