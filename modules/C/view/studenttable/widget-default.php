<?php
if(Session::issetUID() && Session::getUT()=="student"){

		$base = new Database();	$con = $base->connect();

		$sql = "select Inscrito from Estudiante where idEstudiante='".Session::getUID()."'";
		$query = $con->query($sql);

		$row = $query->fetch_array();

		if($row[0]==1) {
				echo 203;
				exit;
		}
		
		$base = new Database();	$con = $base->connect();
		$sql = "select * from Student_Table";
		
		$query = $con->query($sql);
		if(!$query){
				error_log(mysqli_error($con));
				echo "error";
				exit;}

		while($row = $query->fetch_array()){
				$rows[]=$row;
		}

		
		echo '{"row":[';
		foreach($rows as $key=>$row) {
				echo '["","'.$row[0].'","'.$row[1].'","'.$row[2].' '.$row[3].' '.$row[4].'","'.$row[5].'","'.$row[6].'","'.$row[7].'","'.$row[8].'","'.$row[9].'",'.$row[10].','.$row[11].']';
				if($key<count($rows)-1) echo ",";
		}
		echo "]}";
}

?>
