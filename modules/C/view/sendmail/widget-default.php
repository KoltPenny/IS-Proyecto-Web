<?php ob_clean();
if(Session::getUID()=="" && isset($_POST['email'])) {
		$sql = "select email from Estudiante where email='".$_POST['email']."' union select email from Empleado where email='".$_POST['email']."'";
		$query=Executor::doit($sql);
		if($row = $query->fetch_array()){
				if($row[0]==$_POST['email']) echo "success";
				exit;
		}
		else echo "failed";
}
?>
