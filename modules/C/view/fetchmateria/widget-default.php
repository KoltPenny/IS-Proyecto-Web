<?php ob_clean();
if(Session::getUID()!="" && isset($_POST['unidadap'])) {
		$base = new Database();	$con = $base->connect();
		$sql = "select tipoAsig,nombreM,UnidadAcad,hrs_prac,hrs_teo,Creditos,Nivel from Materia where UnidadAp='".$_POST['unidadap']."'";
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));exit;}
		
		while($row = $query->fetch_array()){
				$rows[]=$row;
		}
		echo '{"row":[';
		foreach($rows as $key=>$row) {
				echo '["'.$_POST['unidadap'].'","'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$row[4].'","'.$row[5].'","'.$row[6].'"]';
				if($key>0&&$key<count($rows)-1) echo ",";
		}
		echo "]}";
}
?>
