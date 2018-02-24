<?php
if(Session::getUID()!="") {
		$index = 0;
		$materia = $_POST["materia"];
		$grupo = $_POST["grupo"];
		$base = new Database();	$con = $base->connect();
		$sql = "";
		if($materia!=""){
			$sql = "select * from G_tiene_M where '$materia'";
		}else if($grupo!=""){
			$sql = "select * from G_tiene_M where '$grupo'";
		}
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));exit;}
		while($row = $query->fetch_array()){
				$horario = array("nomGrupo"=>$row[0],"UnidadAp"=>$row[1],"disponibilidad"=>$row[3],"lunes"=>$row[4],"martes"=>$row[5],"miercoles"=>$row[6],"jueves"=>$row[7],"viernes"=>$row[8]);
				$rows[$index]=$horario;
		}
		echo '{"row":[';
		foreach($rows as $key=>$row) {
				echo '["'.$materia.'","","'.$row['nomGrupo'].'","'.$row['lunes'].'","'.$row['martes'].'","'.$row['miercoes'].'","'.$row['jueves'].'","'.$row['viernes'].'","'.$row['disponibilidad'].'"]';
				if($key>0&&$key<count($rows)-1) echo ",";
		}
		echo "]}";
		/*
		foreach($rows as $row) {
				echo "<tr>"
				echo "<td>".$row['UnidadAp']."</td><td></td><td>".$row['nomGrupo']."</td><td>".$row['lunes']."</td><td>".$row['martes']."</td><td>".$row['miercoles']."</td><td>".$row['jueves']."</td><td>".$row['viernes']."</td><td>".$row['disponibilidad']."</td><td>;";
				echo "</tr>"
		}*/
}
?>
