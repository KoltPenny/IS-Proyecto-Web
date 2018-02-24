<?php
if(Session::getUID()!="") {
		$base = new Database();	$con = $base->connect();
		$sql = "select * from Grupo";
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));echo "error"; exit;}

		while($row = $query->fetch_array()){
				$rows[]=$row[0];
		}
		foreach($rows as $row) {
				echo "<option>".$row."</option>";
		}
}
?>
