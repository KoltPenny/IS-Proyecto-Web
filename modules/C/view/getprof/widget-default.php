<?php
if(Session::getUID()!="") {
		$base = new Database();	$con = $base->connect();
		$sql = "select * from Empleado where Tipo = 'P' or Tipo = 'A' ";
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));exit;}

		while($row = $query->fetch_array()){
				$rows[]=$row[0]." : ".$row[1]." ".$row[2]." ".$row[3];
		}
		foreach($rows as $row) {
				echo "<option>".$row."</option>";
		}
}
?>
