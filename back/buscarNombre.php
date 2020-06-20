<?php
session_start();

require '../pass.php';

$target = $_POST['namae'];

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->demo->beers;

$query = ["name" => $target];
$busqueda = $colección->find( $query );

$resultado = array();

foreach ($busqueda as $entry) {
  $temp = array();
  $temp['_id'] = $entry['_id'];;
	$temp['name'] = $entry['name'];
  $temp['brewery'] = $entry['brewery'];

  array_push($resultado, $temp);
}

$_SESSION["resultado"] = $resultado;
$_SESSION["busqueda"] = true;

header("Location: ../../front/query/nombre.php");

?>
