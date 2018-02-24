<?php
//unset($_SESSION["cart"]);
//unset($_SESSION["cart"]);
if(isset($_SESSION["cart"])){
		$cart = $_SESSION["cart"];
		//unset($_SESSION["cart"]);
		
		if(count($cart)>0){
		//$bool = "success";
				foreach($cart as  $c){
						$profesor = new Profesor(
								$c["profesor"],
								$c["nombreG"],
								$c["UnidadAp"]);

						$profesor->add();
						//if($bool!=$profesor->add()) $bool = "error";

						$horario = new Grupo(
								$c["nombreG"],
								$c["UnidadAp"],
								"30",
								"30",
								$c["lunes"],
								$c["martes"],
								$c["miercoles"],
								$c["jueves"],
								$c["viernes"]);
						$horario->add();
						//if($bool!=$horario->add()) $bool = "error";
						//error_log($bool);
						//echo "success";
						unset($_SESSION["cart"]);
						
						
						
				}
				echo "success"; exit;
				//error_log($bool);
				//if($bool == "success"){
				//	echo "success";
				//}else{
				//	echo "error";
				//}
				//error_log("TEST");
				//unset($_SESSION["cart"]);
				////////////////////

		}
}

?>



