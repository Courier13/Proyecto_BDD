<?php
session_start();

require '../pass.php';
require '../globales.php';

$id_empl = intval($_POST['id_empl']);
$Namae = $_POST['namae'];
$ape_pat = $_POST['ape_pat'];
$ape_mat = $_POST['ape_mat'];
$tel = $_POST['tel'];
$id_dom = $_POST['id_dom'];
$calle = $_POST['calle'];
$num = $_POST['num'];
$col = $_POST['col'];
$cp = $_POST['cp'];
$correo = $_POST['correo'];
$puesto = $_POST['puesto'];
$sal = $_POST['sal'];
$hora = $_POST['hora'];
$ingre = $_POST['ingre'];
$prom = $_POST['prom'];

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Empleado;
$aux = $cliente->Examen->Domicilio;

$query = [$EMPLEADO_ID => $id_empl, $EMPLEADO_Nombre => $Namae, $EMPLEADO_Paterno => $ape_pat, $EMPLEADO_Materno => $ape_mat, $EMPLEADO_Tel => $tel, $EMPLEADO_Domicilio => $id_dom, $EMPLEADO_Correo => $correo, $EMPLEADO_Puesto => $puesto, $EMPLEADO_Salario => $sal, $EMPLEADO_Horario => $hora, $EMPLEADO_Ingreso => $ingre, $EMPLEADO_Prom => $prom];
$busqueda = $colección->insertOne( $query );

$query2 = [$DOMICILIO_ID => $id_dom, $DOMICILIO_Calle => $calle, $DOMICILIO_Numero => $num, $DOMICILIO_Colonia => $col, $DOMICILIO_CP => $cp];
$busqueda2 = $aux->insertOne( $query2 );


$_SESSION["insercion"] = true;
//$_SESSION["resultado"] = $busqueda->getInsertedId()

header("Location: ../../front/query/insertEmpl.php");

?>
