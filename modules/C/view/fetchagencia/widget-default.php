<?php
if(Session::getUT()=="admin" && Session::getUID()!="") {
		//$id = preg_replace("/[^0-9]+/","", $_POST['id']);
		$base = new Database();	$con = $base->connect();
		$sql = "select nombreAgencia from Agencia";
		$query = $con->query($sql);
		$rows = null;
		if(!$query){error_log(mysqli_error($con));exit;}
		
		while($row = $query->fetch_array()){
				$rows[]=$row;
		}
		if(count($rows)==0) {
				echo "error";
				exit;
		}
		//echo '{"row":[';
		foreach($rows as $key=>$row) {
				//echo '["'.$row[0].'","'.$row[1].'"]';
				//xif($key>0&&$key<count($rows)-1) echo ",";
				echo "<option>".$row[0]."</option>";
		}
		//echo "]}";
}
?>
