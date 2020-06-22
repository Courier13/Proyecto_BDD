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
  <link rel="stylesheet" href="../css/insert.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body style=" background: rgb(2,0,36);
background: linear-gradient(356deg, rgba(2,0,36,1) 14%, rgba(9,24,121,1) 35%, rgba(0,212,255,1) 100%); ">

 <div class="contenedor">
 <legend class="text-center header"> Bienvenido <?php echo $usr; ?> </legend>

    <div class="row">
      <div class="col-md-12">

        <div class="well well-sm formulario">
          <form class="form-horizontal" method="post" action="./query/insrtProd.php">
          
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Insertar producto</label> 
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>

                </div>
              </div>
          
        
          </form>

          <form class="form-horizontal" method="post" action="./query/update.php">
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Actualizar producto</label>
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>

                </div>
              </div>
          
          </form>
          <form class="form-horizontal" method="post" action="./query/insertEmpl.php">
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Agregar empleado</label>
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>

                </div>
              </div>
             
          </form>
          <form class="form-horizontal" method="post" action="./query/updatetEmpl.php">
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">Actualizar empleado</label>
                  <button type="submit" name="submit" class="btn btn-outline-danger"> GO</button>

                </div>
              </div>
        
          </form>
          <form class="form-horizontal" method="post" action="bienvenido.php">
            
              <div class="form-group">
                <div class="col-md-8">
                  
                    <button type="submit" name="submit" class="btn btn-outline-danger" >
                      Back
                    </button>
                
                </div>
              </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
