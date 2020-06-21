<?php
session_start();
if ($_SESSION["login"] == false ) {
  header("Location: ../login.php");
}
$usr = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Examen BDD</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body style="background: linear-gradient(#e66465, #9198e5);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="./query/nombre.php">
            <fieldset>
              <legend class="text-center header"> Bienvenido <?php echo $usr; ?> </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Busqueda de producto</label>
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
          <form class="form-horizontal" method="post" action="./query/lookEmpleado.php">
            <fieldset>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Busqueda de empleado</label>
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
          <form class="form-horizontal" method="post" action="bienvenido.php">
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
