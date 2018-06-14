<?php
if(isset($_POST['json'])) {

		$json = json_decode($_POST['json']);
		$size = sizeof($json->body);

		//LIMPIAR JSON
		$json->usr = preg_replace("/[^a-zA-Z0-9\s]+/","", $json->usr);
		$json->pwd = preg_replace("/[^a-zA-Z0-9\s]+/","", $json->pwd);
		$json->ip = preg_replace("/[^0-9\\.\s]+/","", $json->ip);
		if($size<1 ) { echo "100";return;}
		else {
				$base = new Database();
				$con = $base->connect_specific($json->usr,$usr->pwd,$json->ip,"agencias");

				foreach($json->body as $body)
				{
						$sql = "insert into ".$json->name." values (".implode(",",$body).")";
						error_log($sql);
						$query = $con->query($sql);
						if(!$query){error_log(mysqli_error($con));exit;}
				}
				
				//$query = $con->query($sql);
				/*$rows = array();
					 error_log("ROWS BEFORE".count($rows));
					 error_log($sql);
					 if(!$query){error_log(mysqli_error($con));exit;}
					 
					 while($row = $query->fetch_row()){
					 $rows[]=$row;
					 }

					 error_log("ROWS AFTER".count($rows));
					 
					 if(count($rows)==0) {	echo "101";	exit; }
					 
					 else echo json_encode($rows);*/
		}		
}
?>
