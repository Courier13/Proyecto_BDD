<?php
session_start();

require '../pass.php';
require '../globales.php';

$target_ID = $_POST['id_prod'];
$target_nombre = $_POST['namae'];
$target_comp = $_POST['comp'];
$target_prec = $_POST['prec'];
$target_exis = $_POST['exis'];
$target_preOfer = $_POST['PreOfer'];
$target_ofer = $_POST['oferta'];
$target_garan = $_POST['garan'];
$target_cat = $_POST['cat'];
$target_prov = $_POST['prov'];

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección = $cliente->Examen->Producto;

$aux = explode(", ", $target_comp) ;

$query = [$PRODUCTO_ID => $target_ID, $PRODUCTO_Nombre => $target_nombre, $PRODUCTO_Compatibles => $aux, $PRODUCTO_Precio => $target_prec, $PRODUCTO_Existencia => $target_exis, $PRODUCTO_Precio_Oferta => $target_preOfer, $PRODUCTO_Oferta => $target_ofer, $PRODUCTO_Garantia => $target_garan, $PRODUCTO_Categoria => $target_cat, $PRODUCTO_Proveedor => $target_prov];
$busqueda = $colección->insertOne( $query );


$_SESSION["insercion"] = true;
$_SESSION["resultado"] = "Id: " $busqueda->getInsertedId();

header("Location: ../../front/query/insrtProd.php");

?>
