<?php
if(Session::getUID()!="") {
		$base = new Database();	$con = $base->connect();
		$sql = "select nomPila,ApPater,ApMater from Empleado where Tipo='A' or Tipo='P'";
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));exit;}

		while($row = $query->fetch_array()){
				$rows[]=$row;
		}
		foreach($rows as $row) {
				echo "<option>".$row[0]." ".$row[1]." ".$row[2]."</option>";
		}
}
?>
