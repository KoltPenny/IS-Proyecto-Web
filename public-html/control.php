<?php
// el archivo autoload inicializa todos lo archivos necesarios para que el framework funcione
include "../../autoload.php";
// cargamos el modulo iniciar.
Core::loadModule("C");
if(isset($_GET['view'])) View::load($_GET['view']);
?>
