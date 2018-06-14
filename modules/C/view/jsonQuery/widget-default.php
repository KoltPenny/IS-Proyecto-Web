<?php
if(isset($_POST['json'])) {

		//error_log($_POST['json']);
		$json = json_decode($_POST['json']);
		$size = sizeof($json->body);
		if($size<2 || 2>$size) { echo "100";return;}
		else {
				$base = new Database();
				$con = $base->connect();
				
				$sql = "select * from ".$json->name.
							 " where ".$json->body[0]->attr." ".$json->body[0]->op." '".$json->body[0]->val."'".
							 "and ".$json->body[1]->attr." ".$json->body[1]->op." '".$json->body[1]->val."'".
							 "order by ".$json->body[0]->attr;

				$query = $con->query($sql);
				$rows = array();
				error_log("ROWS BEFORE".count($rows));
				error_log($sql);
				if(!$query){error_log(mysqli_error($con));exit;}
				
				while($row = $query->fetch_row()){
						$rows[]=$row;
				}

				error_log("ROWS AFTER".count($rows));
				
				if(count($rows)==0) {	echo "101";	exit; }
				
				else echo json_encode($rows);
		}
		
}

?>
