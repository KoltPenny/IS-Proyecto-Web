<?php
if(Session::getUT()=="student" && Session::getUID()!="" && isset($_POST['id'])) {
		$id = preg_replace("/[^0-9]+/","", $_POST['id']);
		$grupo = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['grupo']);
		$mat = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['mat']);
		$base = new Database();	$con = $base->connect();
		$sql = "insert into Inscrito_en values('$id','$grupo','$mat')";
		$query = $con->query($sql);
		$rows = null;
		if(!$query){error_log(mysqli_error($con));exit;}
}
?>
