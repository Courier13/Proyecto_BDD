<?php

require 'vendor/autoload.php'; // incluir lo bueno de Composer

$user = "mike";
$pwd = 'hola2';

$cliente = new MongoDB\Client("mongodb://${user}:${pwd}@localhost:27017");

?>
