<?php
session_start();

require '../pass.php';
require '../globales.php';

$target = $_POST['namae'];
$param = $_POST['tipo'];

switch ($_POST['tipo']) {
  case 'nombre':
    $param = $EMPLEADO_Nombre;
    break;
  case 'apellido_pat':
    $param = $EMPLEADO_Paterno;
    break;
  case 'puesto':
    $param = $EMPLEADO_Puesto;
    break;
  case 'horario':
    $param = $EMPLEADO_Horario;
    break;

  default:
    $param = $EMPLEADO_Nombre;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Empleado;
$aux = $cliente->Examen->Domicilio;

$query = [$param => $target];
$busqueda = $colección->find( $query );
$busquedaAUX = $aux->find( );

$resultado = array();

foreach ($busqueda as $entry) {
  $temp = array();
  $temp[$EMPLEADO_ID] = $entry[$EMPLEADO_ID];
	$temp[$EMPLEADO_Nombre] = $entry[$EMPLEADO_Nombre];
  $temp[$EMPLEADO_Paterno] = $entry[$EMPLEADO_Paterno];
  $temp[$EMPLEADO_Materno] = $entry[$EMPLEADO_Materno];
  $temp[$EMPLEADO_Tel] = $entry[$EMPLEADO_Tel];
  $temp[$EMPLEADO_Domicilio] = $entry[$EMPLEADO_Domicilio];
  //*
  $VIP = $entry[$EMPLEADO_Domicilio];
  foreach ($busquedaAUX as $test1) {
    if ($test1[$DOMICILIO_ID] == $VIP) {
      $temp[$DOMICILIO_Calle] = $test1[$DOMICILIO_Calle];
      $temp[$DOMICILIO_Numero] = $test1[$DOMICILIO_Numero];
      $temp[$DOMICILIO_Colonia] = $test1[$DOMICILIO_Colonia];
      $temp[$DOMICILIO_CP] = $test1[$DOMICILIO_CP];
    }
  }// */

  $temp[$EMPLEADO_Correo] = $entry[$EMPLEADO_Correo];
  $temp[$EMPLEADO_Puesto] = $entry[$EMPLEADO_Puesto];
  $temp[$EMPLEADO_Salario] = $entry[$EMPLEADO_Salario];
  $temp[$EMPLEADO_Horario] = $entry[$EMPLEADO_Horario];
  $temp[$EMPLEADO_Ingreso] = $entry[$EMPLEADO_Ingreso];
  $temp[$EMPLEADO_Prom] = $entry[$EMPLEADO_Prom];

  array_push($resultado, $temp);
}


$_SESSION["resultado"] = $resultado;
$_SESSION["busqueda"] = true;

//echo json_encode($resultado);

header("Location: ../../front/query/lookEmpleado.php");

?>
