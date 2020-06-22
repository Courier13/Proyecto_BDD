<?php
session_start();
if ($_SESSION["login"] == false ) {
  header("Location: ../../login.php");
}
$usr = $_SESSION["usuario"];
$resultado = $_SESSION["resultado"];
require '../../globales.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Examen BDD</title>
  <link rel="stylesheet" href="../../css/nombre.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body style=" background: rgb(2,0,36);
background: linear-gradient(356deg, rgba(2,0,36,1) 14%, rgba(9,24,121,1) 35%, rgba(0,212,255,1) 100%);">
  <div class="contenedor">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="../../back/buscarNombre.php">
            
              <legend class="text-center header"> Busqueda de producto <br /> Usuario: <?php echo $usr; ?> </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="namae" placeholder="Busqueda">
                  <label>Parametro de busqueda</label>
                  <select name="tipo" class="col-12">
                    <option value="nombre" selected>Nombre</option>
                    <option value="compatibles">Compatibles</option>
                    <option value="cat">Categoria</option>
                    <option value="prov">Proveedor</option>
                  </select>
                  <button type="submit" name="submit" class="btn btn-outline-danger btn-block"> Search</button>

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
          </form>
          <form class="form-horizontal" method="post" action="../busqueda.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                  <button type="submit" name="submit" class="btn btn-outline-danger btn-block">Back</button>

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
