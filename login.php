<?php
session_start();
$_SESSION["login"] = false;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Examen BDD</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="./back/check.php">
            <fieldset>
              <legend class="text-center header"> Login </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="user" placeholder="Nombre">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="password" required="required" name="passwd" placeholder="Contraseña">
                </div>
              </div>
              <?php if ($_SESSION["error"]) {
                echo "Error en el login. Acceso denegado";
                session_destroy();
              } ?>
              <div class="form-group">
                <div class="col-md-8">
                  <p><button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">Enviar</button></p>
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
