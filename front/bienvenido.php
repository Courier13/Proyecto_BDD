<?php
session_start();
if ($_SESSION["login"] == false ) {
  header("Location: ../login.php");
}
$usr = $_SESSION["usuario"];
$_SESSION["CarritoFlag"] = false;
$_SESSION["carro"] = array();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Examen BDD Bienvenida</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="busqueda.php">
            <fieldset>
              <legend class="text-center header"> Bienvenido <?php echo $usr; ?> </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Busqueda</label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">
                      Ir
                    </button>
                  </p>
                </div>
              </div>
            </fieldset>
          </form>
          <form class="form-horizontal" method="post" action="ventas.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Ventas</label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">
                      Ir
                    </button>
                  </p>
                </div>
              </div>
            </fieldset>
          </form>
          <form class="form-horizontal" method="post" action="insert.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Insertar</label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">
                      Ir
                    </button>
                  </p>
                </div>
              </div>
            </fieldset>
          </form>
          <form class="form-horizontal" method="post" action="../back/logout.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Salir</label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">
                      Salir
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
