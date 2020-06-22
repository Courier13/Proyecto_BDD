<?php
session_start();
if ($_SESSION["login"] == false ) {
  header("Location: ../login.php");
}
$usr = $_SESSION["usuario"];
// $resultado = $_SESSION["resultado"];
$carro = $_SESSION["carro"];
require '../globales.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Examen BDD</title>
  <link rel="stylesheet" href="../css/ventas.css">
  <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body style=" background: rgb(2,0,36);
background: linear-gradient(356deg, rgba(2,0,36,1) 14%, rgba(9,24,121,1) 35%, rgba(0,212,255,1) 100%); ">
  <div class="contenedor">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="../back/buscarProdVenta.php">
            <fieldset>
              <legend class="text-center header"> Ventas <br /> Usuario: <?php echo $usr; ?> </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control col-3" type="text" required="required" name="namae" placeholder="Busqueda">
                </div>
                <div class="col-md-8">
                  <label>Parametro de busqueda</label>
                  <select name="tipo">
                    <option value="nombre" selected>Nombre</option>
                    <option value="compatibles">Compatibles</option>
                    <option value="cat">Categoria</option>
                    <option value="prov">Proveedor</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                  <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: red">Search</button>

                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">
                    <?php
                    if ($_SESSION["busqueda"]) {
                      echo "Busqueda: <br />";
                      foreach ($resultado as $entry) {
                        $_id = $entry[$PRODUCTO_ID];
                      	$nombre = $entry[$PRODUCTO_Nombre];
                        $compat = $entry[$PRODUCTO_Compatibles];
                        $precio = $entry[$PRODUCTO_Precio];
                        $exis = $entry[$PRODUCTO_Existencia];
                        $preOfer = $entry[$PRODUCTO_Precio_Oferta];
                        $oferta = $entry[$PRODUCTO_Oferta];
                        $garant = $entry[$PRODUCTO_Garantia];
                        $cat = $entry[$PRODUCTO_Categoria];
                        $pro = $entry[$PRODUCTO_Proveedor];

                        echo "Id: " . $_id . "<br />" .
                        " Nombre: " . $nombre . "<br />" .
                        " Coches compatibles: " ;
                        echo json_encode($compat);
                        echo "<br />" .
                        " Precio: " . $precio . "<br />" .
                        " Existencias: " . $exis . "<br />" .
                        " Precio de oferta: " . $preOfer . "<br />" .
                        " Esta en oferta: " . $oferta . "<br />" .
                        " Tiempo de garantia: " . $garant . "<br />" .
                        " Categoria: " . $cat . "<br />" .
                        " Proveedor: " . $pro . "<br />" .
                        "<br />";
                      }
                      $_SESSION["busqueda"] = false;
                    }
                    ?>
                  </label>
                </div>
              </div>
            </fieldset>
          </form>
          <form class="form-horizontal" method="post" action="../back/agregarCarro.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="id_prod" placeholder="ID del Producto">
                </div>
                <div class="col-md-8"><div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="cant_prod" placeholder="Cantidad del Producto">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: red">
                      Add to cart
                    </button>
                  </p>
                </div>
              </div>

                <div class="col-md-8">
                  <label class="col-md-8">
                    <?php
                    if ($_SESSION["CarritoFlag"]) {
                      echo "Carrito: <br /> <br />";
                      foreach ($carro as $entry) {
                        $_id = $entry[$PRODUCTO_ID];
                      	$nombre = $entry[$PRODUCTO_Nombre];
                        $precio = $entry[$PRODUCTO_Precio];
                        $cant = $entry[$PRODUCTO_VENTA_Cantidad];
                        $preOfer = $entry[$PRODUCTO_Precio_Oferta];
                        $oferta = $entry[$PRODUCTO_Oferta];

                        echo "Id articulo: " . $_id . "<br />" .
                        " Nombre: " . $nombre . "<br />" .
                        " Precio: " . $precio . "<br />" .
                        " Cantidad: " . $cant . "<br />" .
                        " Precio de oferta: " . $preOfer . "<br />" .
                        " Esta en oferta: " . $oferta . "<br />" .
                        "<br />";
                      }
                      $_SESSION["busqueda"] = false;
                    }
                    ?>
                  </label>
                </div>
              </div>
            </fieldset>
          </form>
          <form class="form-horizontal" method="post" action="../back/venderProd.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="id_client" placeholder="Id del cliente">
                </div>
                <div class="col-md-8">
                  <label>Requiere factura</label>
                  <select name="facturacion">
                    <option value="sin" selected>No</option>
                    <option value="con">Si</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: red">
                      Sale contrete
                    </button>
                  </p>
                </div>
              </div>
            </fieldset>
          </form>
          <form class="form-horizontal" method="post" action="bienvenido.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: red">
                      Back
                    </button>
                  </p>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
