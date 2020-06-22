<?php
session_start();
$_SESSION["login"] = false;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Examen BDD</title>
  <link rel="stylesheet" href="./css/login.css">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body style=" background: rgb(2,0,36);
background: linear-gradient(356deg, rgba(2,0,36,1) 14%, rgba(9,24,121,1) 35%, rgba(0,212,255,1) 100%); ">

  <div class="container">
 
    <div class="row">
    
      <div class="col-md-12">
      <div class="brand_logo_container">
            <img src="./front/img/personal.png" class="brand_logo" alt="Logo">
					</div>
        <div class="well well-sm">
       
          <form class="form-horizontal" method="post" action="./back/check.php">
          
            <fieldset class="">
            
              <h1 class="text-center "> Login </h1>
              <div class="form-group text-center">
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
                  <p><button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Enviar</button></p>
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
