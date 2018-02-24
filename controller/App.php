<?php


//obtiene las configuraciones, muestra y carga los contenidos necesarios.

class App {

		public function __construct($module){
				$this->loadModule($module);

		}

		public  function loadModule($module){
				if(!isset($_GET['module'])){
						Module::setModule($module);
						include "modules/".$module."/init.php";
				}else{
						Module::setModule($_GET['module']);
						if(Module::isValid()){
								include "modules/".$_GET['module']."/init.php";
						}else {
								Module::Error();
						}
				}

		}

}



?>
