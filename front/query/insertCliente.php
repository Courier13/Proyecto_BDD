<?php
session_start();
if ($_SESSION["login"] == false ) {
  header("Location: ../../login.php");
}
$usr = $_SESSION["usuario"];
$resultado = $_SESSION["resultado"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Examen BDD</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="../../back/altaCliente.php">
            <fieldset>
              <legend class="text-center header"> Agregar empleado <br /> Usuario: <?php echo $usr; ?> </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="id_cliente" placeholder="Id cliente">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="nombre" placeholder="Nombre">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="ape_pat" placeholder="Apellido Paterno">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="ape_mat" placeholder="Apellido Materno">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="razon_social" placeholder="Razon Social">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="rfc" placeholder="RFC">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="correo" placeholder="Correo">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">
                      Insertar
                    </button>
                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">
                    <?php
                    if ($_SESSION["insercion"]) {
                      echo "Cliente Agregado correctamente <br />";
                      echo $resultado;
                      $_SESSION["insercion"] = false;
                    }
                    ?>
                  </label>
                </div>
              </div>
            </fieldset>
          </form>
          <form class="form-horizontal" method="post" action="../insert.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">
                      Volver
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
