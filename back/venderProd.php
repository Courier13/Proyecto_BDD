<?php
session_start();

require '../pass.php';
require '../globales.php';

setlocale(LC_TIME,"es_ES");
$ID_1 = strftime("%Y");
$ID_2 = strftime("%m");
$ID_3 = strftime("%d");
$ID_4 = strftime("%H");
$ID_5 = strftime("%M");
$ID_venta = intval($ID_1 . $ID_2 . $ID_3 . $ID_4 . $ID_5);
$Fecha = intval($ID_3 . $ID_2 . $ID_1);

$targetID = intval($_POST['id_client']);
$param = $_POST['facturacion'];

$resultado = $_SESSION["carro"];
$subTotal = 0;

foreach ($resultado as $entry) {
  $temp = array();
  $temp[$PRODUCTO_VENTA_ID] = $ID_venta . $entry[$PRODUCTO_ID];
	$temp[$PRODUCTO_VENTA_Cantidad] = $entry[$PRODUCTO_VENTA_Cantidad];
  $temp[$PRODUCTO_VENTA_Precio] = $entry[$PRODUCTO_Precio];
  $temp[$PRODUCTO_VENTA_ID_Venta] = $ID_venta;
  $temp[$PRODUCTO_VENTA_ID_Producto] = $entry[$PRODUCTO_ID];
  $temp[$PRODUCTO_Oferta] = $entry[$PRODUCTO_Oferta];
  $temp[$PRODUCTO_Existencia] = $entry[$PRODUCTO_Existencia];

  if ($temp[$PRODUCTO_Existencia] < $temp[$PRODUCTO_VENTA_Cantidad]) {
    echo "oiajsdfa";
    break;
    echo "aslfdasd";
  }

  $target_Prod = $temp[$PRODUCTO_VENTA_ID_Producto];
  $target_Change = (intval($temp[$PRODUCTO_Existencia]) - intval($temp[$PRODUCTO_VENTA_Cantidad]));
  $subTotal = $subTotal + ($temp[$PRODUCTO_VENTA_Cantidad] * $temp[$PRODUCTO_VENTA_Precio]);

  array_push($carroVenta, $temp);

  $cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
  $colección = $cliente->Examen->Producto_venta;

  $insertManyResult = $colección->insertOne( $temp );

  $clienteUP = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
  $colecciónUP = $clienteUP->Examen->Producto;

  $query = [$PRODUCTO_ID => intval($target_Prod)];
  $update = ['$set' => [$PRODUCTO_Existencia => $target_Change]];

  $UpResult = $colecciónUP->updateOne( $query, $update );
  printf("Matched %d document(s)\n", $UpResult->getMatchedCount());
  printf("Modified %d document(s)\n", $UpResult->getModifiedCount());

}

$IVA = $subTotal * .16;
$Total = $subTotal * $IVA;

$query2 = [$VENTA_ID => $ID_venta, $VENTA_Subtotal => $subTotal, $VENTA_Iva => $IVA, $VENTA_Total => $Total, $VENTA_Fecha => $Fecha, $VENTA_Cliente => $targetID];

$cliente2 = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
$colección2 = $cliente2->Examen->Venta;

$insert = $colección2->insertOne( $query2 );

if ($param == "con") {
  $query3 = [$FACTURA_ID => $ID_venta . $targetID, $FACTURA_Fecha => $Fecha, $FACTURA_Cliente => $targetID];

  $cliente3 = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");
  $colección3 = $cliente3->Examen->Factura;

  $insert = $colección2->insertOne( $query3 );
}

$_SESSION["carro"] = array();
["CarritoFlag"] = false;

header("Location: ../../front/ventas.php");

?>
