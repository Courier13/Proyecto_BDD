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
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="post" action="../../back/BuscarEmpleado.php">
            <fieldset>
              <legend class="text-center header"> Busqueda de Empleado <br /> Usuario: <?php echo $usr; ?> </legend>
              <div class="form-group">
                <div class="col-md-8">
                  <input class="form-control" type="text" required="required" name="namae" placeholder="Busqueda">
                </div>
                <div class="col-md-8">
                  <label>Parametro de busqueda</label>
                  <select name="tipo">
                    <option value="nombre" selected>Nombre</option>
                    <option value="apellido_pat">Apellido Paterno</option>
                    <option value="puesto">Puesto</option>
                    <option value="horario">Horario</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <p>
                    <button type="submit" name="submit" style="margin-left: 350px; border-radius: 10px; padding-left: 20px; padding-right: 20px;color: white; background-color: green">
                      Buscar
                    </button>
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
                        $_id = $entry[$EMPLEADO_ID];
                      	$nombre = $entry[$EMPLEADO_Nombre];
                        $pat = $entry[$EMPLEADO_Paterno];
                        $mat = $entry[$EMPLEADO_Materno];
                        $tel = $entry[$EMPLEADO_Tel];
                        $dom1 = $entry[$DOMICILIO_Calle];
                        $dom2 = $entry[$DOMICILIO_Numero];
                        $dom3 = $entry[$DOMICILIO_Colonia];
                        $dom4 = $entry[$DOMICILIO_CP];
                        $correo = $entry[$EMPLEADO_Correo];
                        $puesto = $entry[$EMPLEADO_Puesto];
                        $salario = $entry[$EMPLEADO_Salario];
                        $hora = $entry[$EMPLEADO_Horario];
                        $ingreso = $entry[$EMPLEADO_Ingreso];
                        $prom = $entry[$EMPLEADO_Prom];

                        echo "Id: " . $_id . "<br />" .
                        " Nombre: " . $nombre . "<br />" .
                        " Apellido paterno: " . $pat .  "<br />" .
                        " Apellido materno: " . $mat . "<br />" .
                        " Telefono: " . $tel . "<br />" .
                        " Domicilio: " . "<br />" .
                        " Calle: " . $dom1 . "<br />" .
                        " Numero: " . $dom2 . "<br />" .
                        " Colonia: " . $dom3 . "<br />" .
                        " Codigo Postal: " . $dom4 . "<br />" .
                        " Correo: " . $correo . "<br />" .
                        " Salario: " . $salario . "<br />" .
                        " Horario: " . $hora . "<br />" .
                        " Ingreso: " . $ingreso . "<br />" .
                        " Codigo de Promoción: " . $prom . "<br />" .
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
          <form class="form-horizontal" method="post" action="../busqueda.php">
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
