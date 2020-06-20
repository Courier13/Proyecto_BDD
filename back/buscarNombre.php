<?php
session_start();

require '../pass.php';
require '../globales.php';

$target = $_POST['namae'];
$param = $_POST['tipo'];

switch ($_POST['tipo']) {
  case 'nombre':
    $param = $PRODUCTO_Nombre;
    break;
  case 'compatibles':
    $param = $PRODUCTO_Compatibles;
    break;
  case 'cat':
    $param = $PRODUCTO_Categoria;
    break;
  case 'prov':
    $param = $PRODUCTO_Proveedor;
    break;

  default:
    $param = $PRODUCTO_Nombre;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Producto;

if ($param == $PRODUCTO_Compatibles) {
  $query = [$PRODUCTO_Compatibles => [ '$in' => [$target] ] ];
}else {
  $query = [$param => $target];
}

$busqueda = $colección->find( $query );

$resultado = array();

foreach ($busqueda as $entry) {
  $temp = array();
  $temp2 = array();
  $temp[$PRODUCTO_ID] = $entry[$PRODUCTO_ID];
	$temp[$PRODUCTO_Nombre] = $entry[$PRODUCTO_Nombre];

  $aux = $entry[$PRODUCTO_Compatibles];
  foreach ($aux as $test) {
    array_push($temp2, $test);
  }
  $temp[$PRODUCTO_Compatibles] = $temp2;

  $temp[$PRODUCTO_Precio] = $entry[$PRODUCTO_Precio];
  $temp[$PRODUCTO_Existencia] = $entry[$PRODUCTO_Existencia];
  $temp[$PRODUCTO_Precio_Oferta] = $entry[$PRODUCTO_Precio_Oferta];
  $temp[$PRODUCTO_Oferta] = $entry[$PRODUCTO_Oferta];
  $temp[$PRODUCTO_Garantia] = $entry[$PRODUCTO_Garantia];
  $temp[$PRODUCTO_Categoria] = $entry[$PRODUCTO_Categoria];
  $temp[$PRODUCTO_Proveedor] = $entry[$PRODUCTO_Proveedor];

  array_push($resultado, $temp);
}

$_SESSION["resultado"] = $resultado;
$_SESSION["busqueda"] = true;

//echo json_encode($resultado);
header("Location: ../../front/query/nombre.php");

?>
