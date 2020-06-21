<?php
session_start();

require '../pass.php';
require '../globales.php';

$target_id = $_POST['id_client'];
$target_Change = $_POST['change'];
$target_Class = $_POST['clase'];

switch ($_POST['clase']) {
  case 'correo':
    $target_Class = $CLIENTE_Correo;
    break;
  case 'razon':
    $target_Class = $CLIENTE_Razon;
    break;

  default:
    $target_Class = $CLIENTE_Correo;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Cliente;

$query = [$CLIENTE_ID => intval($target_id)];
$update = ['$set' => [$target_Class => $target_Change]];

$busqueda = $colección->updateOne( $query, $update );


$_SESSION["insercion"] = true;
$_SESSION["match"] = $busqueda->getMatchedCount();
$_SESSION["mod"] = $busqueda->getModifiedCount();


header("Location: ../../front/query/update.php");

?>
