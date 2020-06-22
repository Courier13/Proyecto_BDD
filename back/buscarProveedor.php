<?php
session_start();

require '../pass.php';
require '../globales.php';

$target = $_POST['namae'];
$param = $_POST['tipo'];

switch ($_POST['tipo']) {
  case 'nombre':
    $param = $PROVEEDOR_Nombre;
    break;
  case 'empres':
    $param = $PROVEEDOR_Empresa;
    break;

  default:
    $param = $PROVEEDOR_Nombre;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Proveedor;

$query = [$param => $target];
$busqueda = $colección->find( $query );


$resultado = array();

foreach ($busqueda as $entry) {
  $temp = array();
  $temp[$PROVEEDOR_ID] = $entry[$PROVEEDOR_ID];
	$temp[$PROVEEDOR_Nombre] = $entry[$PROVEEDOR_Nombre];
  $temp[$PROVEEDOR_Empresa] = $entry[$PROVEEDOR_Empresa];
  $temp[$PROVEEDOR_Dom] = $entry[$PROVEEDOR_Dom];

  $cliente2 = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
  $aux = $cliente2->Examen->Domicilio;
  $VIP = $entry[$PROVEEDOR_Dom];
  $query2 = [$DOMICILIO_ID => $VIP];
  $busquedaAUX = $aux->find( $query2 );
  foreach ($busquedaAUX as $test1) {

    $temp[$DOMICILIO_Calle] = $test1[$DOMICILIO_Calle];
    $temp[$DOMICILIO_Numero] = $test1[$DOMICILIO_Numero];
    $temp[$DOMICILIO_Colonia] = $test1[$DOMICILIO_Colonia];
    $temp[$DOMICILIO_CP] = $test1[$DOMICILIO_CP];

  }

  array_push($resultado, $temp);
}


$_SESSION["resultado"] = $resultado;
$_SESSION["busqueda"] = true;

//echo json_encode($resultado);

header("Location: ../../front/query/lookProveedor.php");

?>
