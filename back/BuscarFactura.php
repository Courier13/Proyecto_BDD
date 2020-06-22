<?php
session_start();

require '../pass.php';
require '../globales.php';

$target = $_POST['namae'];
$param = $_POST['tipo'];

switch ($_POST['tipo']) {
  case 'nombre':
    $param = $FACTURA_ID;
    break;
  case 'ape_pat':
    $param = $FACTURA_Fecha;
    break;
  case 'razon':
    $param = $FACTURA_Cliente;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Factura;

$query = [$param => $target];


$busqueda = $colección->find( $query );

$resultado = array();

foreach ($busqueda as $entry) {
  $temp = array();
  $temp[$FACTURA_ID] = $entry[$FACTURA_ID];
	$temp[$FACTURA_Fecha] = $entry[$FACTURA_Fecha];
  $temp[$FACTURA_Cliente] = $entry[$FACTURA_Cliente];

  array_push($resultado, $temp);
}

$_SESSION["resultado"] = $resultado;
$_SESSION["busqueda"] = true;

//echo json_encode($resultado);
header("Location: ../../front/query/.php");

?>
