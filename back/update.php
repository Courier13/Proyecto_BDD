<?php
session_start();

require '../pass.php';
require '../globales.php';

$target_id = $_POST['id_prod'];
$target_Change = $_POST['change'];
$target_Class = $_POST['clase'];

switch ($_POST['clase']) {
  case 'nombre':
    $target_Class = $PRODUCTO_Precio;
    break;
  case 'exis':
    $target_Class = $PRODUCTO_Existencia;
    break;
  case 'preOfer':
    $target_Class = $PRODUCTO_Precio_Oferta;
    break;
  case 'Ofer':
    $target_Class = $PRODUCTO_Oferta;
    break;
  case 'Garan':
    $target_Class = $PRODUCTO_Garantia;
    break;

  default:
    $target_Class = $PRODUCTO_Precio;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Producto;

$query = [$PRODUCTO_ID => $target_id];
$update = ['$set' => [$target_Class => $target_Change]];

$query = [$PRODUCTO_ID => intval($target_id)];
$update = ['$set' => [$target_Class => $target_Change]];

$busqueda = $colección->updateOne( $query, $update );


$_SESSION["insercion"] = true;
$_SESSION["match"] = $busqueda->getMatchedCount();
$_SESSION["mod"] = $busqueda->getModifiedCount();


header("Location: ../../front/query/update.php");

?>
