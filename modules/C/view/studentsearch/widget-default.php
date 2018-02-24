<?php
if(Session::issetUID() && Session::getUT()=="student"){

		if(!isset($_POST['parameter'])) { echo "error"; exit; }
		$par = $_POST['parameter'];
		$base = new Database();	$con = $base->connect();
		$sql = "select * from Student_Table where nomPila like '%$par%' or ApPater like '%$par%' or ApMater like '%$par%' or nombreM like '%$par%' or nomGrupo like '%$par%'";
		
		$query = $con->query($sql);
		if(!$query){
				error_log(mysqli_error($con));
				echo "error";
				exit;}
		$rows=null;
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
