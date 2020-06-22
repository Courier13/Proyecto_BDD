<?php
session_start();

require '../pass.php';
require '../globales.php';
//*
$target_ID = intval($_POST['id_Prov']);
$target_nombre = $_POST['namae'];
$target_empres = $_POST['empres'];
$target_ID_dom = $_POST['id_dom'];
$calle = $_POST['calle'];
$num = $_POST['num'];
$col = $_POST['col'];
$cp = $_POST['cp'];

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Proveedor;

$query = [$PROVEEDOR_ID => $target_ID, $PROVEEDOR_Nombre => $target_nombre, $PROVEEDOR_Empresa => $target_empres, $PROVEEDOR_Dom => $target_ID_dom];
$busqueda = $colección->insertOne( $query );

$cliente2 = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección2 = $cliente2->Examen->Domicilio;

$query2 = [$DOMICILIO_ID => $target_ID, $DOMICILIO_Calle => $target_nombre, $DOMICILIO_Numero => $target_empres, $DOMICILIO_Colonia => $target_empres, $DOMICILIO_CP => $target_ID_dom];
$busqueda2 = $colección->insertOne( $query2 );


$_SESSION["insercion"] = true;


header("Location: ../../front/query/.php");

?>
