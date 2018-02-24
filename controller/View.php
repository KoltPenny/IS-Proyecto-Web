<?php


// Una vista corresponde a cada componente visual dentro de un modulo.

class View {
		public static function load($view){
				// Module::$module;
				

				if(!isset($_GET['view'])){
						include "../../modules/".Module::$module."/view/".$view."/widget-default.php";
				}else{
						if(View::isValid()){
								include "../../modules/".Module::$module."/view/".$_GET['view']."/widget-default.php";
						}else{
								View::Error("<b>404 NOT FOUND</b> View <b>".$_GET['view']."</b> folder  !!");
						}



				}
		}

		public static function isValid(){
				$valid=false;
				if(file_exists($file = "../../modules/".Module::$module."/view/".$_GET['view']."/widget-default.php")){
						$valid = true;
				}
				return $valid;
		}

		public static function Error($message){
				print $message;
		}

}



?>
