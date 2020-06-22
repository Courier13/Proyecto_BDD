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
  <link rel="stylesheet" href="../../css/insertEmp.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body style=" background: rgb(2,0,36);
background: linear-gradient(356deg, rgba(2,0,36,1) 14%, rgba(9,24,121,1) 35%, rgba(0,212,255,1) 100%); " >
  <div class="contenedor">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="../../back/altaEmpleado.php">
            <fieldset>
              <legend class="text-center header"> Agregar empleado <br /> Usuario: <?php echo $usr; ?> </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="id_empl" placeholder="Id Empleado">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="namae" placeholder="Nombre">
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
                  <input class="form-control" type="text" required="required" name="tel" placeholder="Telefono">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="id_dom" placeholder="Id domicilio">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="calle" placeholder="Calle">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="num" placeholder="Numero">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="col" placeholder="Colonia">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="cp" placeholder="Codigo Postal">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="correo" placeholder="Correo">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="puesto" placeholder="Puesto">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="sal" placeholder="Salario">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="hora" placeholder="Horario">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="ingre" placeholder="Ingreso">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="prom" placeholder="Codigo de promocion">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                  <button type="submit" name="submit" class="btn btn-outline-danger btn-block">Insert</button>

                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-8">
                    <?php
                    if ($_SESSION["insercion"]) {
                      echo "Empleado Agregado correctamente <br />";
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
