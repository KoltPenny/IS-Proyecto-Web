<?php
if(Session::getUT()=="admin" && Session::getUID()!="" && isset($_POST['id'])) {
		$id = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['id']);
		if($_POST['agencia']=="") {
				$agencia = preg_replace("/[^a-zA-Z0-9]+/","", $_SESSION['agen']);
		}
		else {
				$agencia = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['agencia']);
		}
		$base = new Database();	$con = $base->connect();
		$sql = "select a.nombreAgencia, a.idAgente,a.nombreClave,t.tipo from Agente a, Agente_tipo t where (a.idAgente='".
					 $id."' and a.nombreAgencia='".$agencia."') and (a.idAgente=t.idAgente and a.nombreAgencia=t.nombreAgencia)";
		$query = $con->query($sql);
		$rows = null;

		error_log($sql);
		
		if(!$query){error_log(mysqli_error($con));exit;}
		
		while($row = $query->fetch_array()){
				$rows[]=$row;
		}

		if(count($rows)==0) {
				echo "failed";
				exit;
		}
		echo '{"row":[';
		foreach($rows as $key=>$row) {
				echo '["'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'"]';
				if($key>0&&$key<count($rows)-1) echo ",";
		}
		echo "]}";
}
/*else if(Session::getUT()=="profesor" && Session::getUID()!="") {

	 $base = new Database();	$con = $base->connect();
	 $sql = "select nEmp,nomPila,ApPater,ApMater,Tipo,email from Empleado where nEmp='".Session::getUID()."'";
	 $query = $con->query($sql);
	 $rows = null;
	 if(!$query){error_log(mysqli_error($con));exit;}
	 
	 while($row = $query->fetch_array()){
	 $rows[]=$row;
	 }
	 if(count($rows)==0) {
	 echo "failed";
	 exit;
	 }
	 echo '{"row":[';
	 foreach($rows as $key=>$row) {
	 echo '["'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$row[4].'","'.$row[5].'"]';
	 if($key>0&&$key<count($rows)-1) echo ",";
	 }
	 echo "]}";
	 }*/
?>
