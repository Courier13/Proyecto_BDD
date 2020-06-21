<?php
session_start();

require '../pass.php';
require '../globales.php';

$target = $_POST['namae'];
$param = $_POST['tipo'];

switch ($_POST['tipo']) {
  case 'nombre':
    $param = $CLIENTE_Nombre;
    break;
  case 'ape_pat':
    $param = $CLIENTE_Paterno;
    break;
  case 'razon':
    $param = $CLIENTE_Razon;
    break;
  case 'rfc':
    $param = $CLIENTE_Rfc;
    break;

  default:
    $param = $CLIENTE_Nombre;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Cliente;

$query = [$param => $target];


$busqueda = $colección->find( $query );

$resultado = array();

foreach ($busqueda as $entry) {
  $temp = array();
  $temp[$CLIENTE_ID] = $entry[$CLIENTE_ID];
	$temp[$CLIENTE_Nombre] = $entry[$CLIENTE_Nombre];
  $temp[$CLIENTE_Paterno] = $entry[$CLIENTE_Paterno];
  $temp[$CLIENTE_Materno] = $entry[$CLIENTE_Materno];
  $temp[$CLIENTE_Razon] = $entry[$CLIENTE_Razon];
  $temp[$CLIENTE_Rfc] = $entry[$CLIENTE_Rfc];
  $temp[$CLIENTE_Correo] = $entry[$CLIENTE_Correo];

  array_push($resultado, $temp);
}

$_SESSION["resultado"] = $resultado;
$_SESSION["busqueda"] = true;

//echo json_encode($resultado);
header("Location: ../../front/query/.php");

?>
