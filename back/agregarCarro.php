<?php
session_start();

require '../pass.php';
require '../globales.php';

$target = intval($_POST['id_prod']);
$param = $_POST['cant_prod'];




$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Producto;


$query = [$PRODUCTO_ID => $target];


$busqueda = $colección->find( $query );

$resultado = $_SESSION["carro"];

foreach ($busqueda as $entry) {
  $temp = array();
  $temp[$PRODUCTO_ID] = $entry[$PRODUCTO_ID];
	$temp[$PRODUCTO_Nombre] = $entry[$PRODUCTO_Nombre];
  $temp[$PRODUCTO_Precio] = $entry[$PRODUCTO_Precio];
  $temp[$PRODUCTO_VENTA_Cantidad] = $param;
  $temp[$PRODUCTO_Precio_Oferta] = $entry[$PRODUCTO_Precio_Oferta];
  $temp[$PRODUCTO_Oferta] = $entry[$PRODUCTO_Oferta];
  $temp[$PRODUCTO_Existencia] = $entry[$PRODUCTO_Existencia];


  array_push($resultado, $temp);
}

$_SESSION["carro"] = $resultado;
$_SESSION["CarritoFlag"] = true;

//echo json_encode($resultado);
header("Location: ../../front/ventas.php");

?>
