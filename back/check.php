<?php
session_start();
/*
require '../pass.php';

$usr = $_POST['user'];
$passwd = $_POST['passwd'];
// */
if ( ($usr == "root" ) && ($passwd == "contraseña")) {

  $_SESSION["usuario"] = $usr;
  $_SESSION["login"] = true;
  header("Location: ../front/bienvenido.php");
} else {
  $_SESSION["error"] = true;
  header("Location: ../login.php");
}
?>
