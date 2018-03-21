<?php
// el archivo autoload inicializa todos lo archivos necesarios para que el framework funcione
define("ROOT", "slidle");
ini_set("error_log", "php_errors.log");
include "../autoload.php";
// cargamos el modulo iniciar.
Core::loadModule("IS");

?>
