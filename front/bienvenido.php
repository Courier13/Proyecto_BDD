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
  <link rel="stylesheet" href="./../css/bienvenido.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body style=" background: rgb(2,0,36);
background: linear-gradient(356deg, rgba(2,0,36,1) 14%, rgba(9,24,121,1) 35%, rgba(0,212,255,1) 100%); ">

  <div class="contenedor">
    
    <div class="row">
      
      <div class="col-md-12">
      <h1 class="text-center"> Bienvenido <?php echo $usr; ?> </h1>

        <div class="well well-sm formulario">
          <form class="form-horizontal" method="post" action="busqueda.php">
      
             
              <div class="form-group">
                  <label class="col-md-8">Busqueda</label>
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>
              </div>
          </form>

          <form class="form-horizontal " method="post" action="ventas.php">
          
              <div class="form-group labels">

                  <label class="col-md-8">Ventas</label>
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>
              </div>
          </form>

          <form class="form-horizontal" method="post" action="insert.php">
            
              <div class="form-group labels">

                  <label class="col-md-8 f">Insertar</label>
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>
              </div>

          </form>

          <form class="form-horizontal" method="post" action="../back/logout.php">
       
              <div class="form-group labels">

                  <label class="col-md-8">Salir</label>
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>
              </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
