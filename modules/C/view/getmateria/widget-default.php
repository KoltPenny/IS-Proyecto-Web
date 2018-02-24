<?php
if(Session::getUID()!="") {
		$base = new Database();	$con = $base->connect();
		$sql = "select UnidadAp from Materia";
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));exit;}

		while($row = $query->fetch_array()){
				$rows[]=$row[0];
		}
		foreach($rows as $row) {
				echo "<option>".$row."</option>";
		}
}
?>
