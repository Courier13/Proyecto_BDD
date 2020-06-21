<?php
session_start();

require '../pass.php';
require '../globales.php';

$target_id = intval($_POST['id_Emp']);
$target_Change = $_POST['change'];
$target_Class = $_POST['clase'];

switch ($_POST['clase']) {
  case 'tel':
    $target_Class = $EMPLEADO_Tel;
    break;
  case 'correo':
    $target_Class = $EMPLEADO_Correo;
    break;
  case 'puesto':
    $target_Class = $EMPLEADO_Puesto;
    break;
  case 'sal':
    $target_Class = $EMPLEADO_Salario;
    break;
  case 'hora':
    $target_Class = $EMPLEADO_Horario;
    break;

  default:
    $target_Class = $EMPLEADO_Tel;
    break;
}

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Empleado;

$query = [$EMPLEADO_ID => $target_id];
$update = ['$set' => [$target_Class => $target_Change]];

$busqueda = $colección->updateOne( $query, $update );


$_SESSION["insercion"] = true;
$_SESSION["match"] = $busqueda->getMatchedCount();
$_SESSION["mod"] = $busqueda->getModifiedCount();


header("Location: ../../front/query/updatetEmpl.php");

?>
