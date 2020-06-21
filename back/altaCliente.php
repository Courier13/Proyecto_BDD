<?php
session_start();

require '../pass.php';
require '../globales.php';
//*
$target_ID = intval($_POST['id_Client']);
$target_nombre = $_POST['namae'];
$target_ape_pat = $_POST['ape_pat'];
$target_ape_mat = $_POST['ape_mat'];
$target_razon = $_POST['razon'];
$target_rfc = $_POST['rfc'];
$target_correo = $_POST['correo'];

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Cliente;


$query = [$CLIENTE_ID => $target_ID, $CLIENTE_Nombre => $target_nombre, $CLIENTE_Paterno => $target_ape_pat, $CLIENTE_Materno => $target_ape_mat, $CLIENTE_Razon => $target_razon, $CLIENTE_Rfc => $target_rfc, $CLIENTE_Correo => $target_correo];
$busqueda = $colección->insertOne( $query );


$_SESSION["insercion"] = true;


header("Location: ../../front/query/.php");

?>
