<?php
if(Session::getUT()=="student" && Session::getUID()!="") {
		if(isset($_POST['stage']) && $_POST['stage']==0) {
				$grupo = $_POST['group'];
				$materia = $_POST['nom_mat'];
				$base = new Database();	$con = $base->connect();

				$sql = "select Inscrito from Estudiante where idEstudiante='".Session::getUID()."'";
				$query = $con->query($sql);

				$row = $query->fetch_array();

				error_log($row[0]);
				
				if($row[0]==1) {
						$_SESSION["locked"]=true;
						echo 203;
						exit;
				}
				
				$sql = "select UnidadAp from Materia where nombreM='$materia'";
				$query = $con->query($sql);
				$rows = null;

				if(!$query){
						echo 401;
						error_log(mysqli_error($con));
						exit;
				}
				
				$row = $query->fetch_array();

				if(isset($_SESSION['locked'])) {
						echo 202;
						exit;
				}
				
				if(isset($_SESSION['materias_str'])&&isset($_SESSION['materias'])) {
						
						$str = "('".Session::getUID()."','$grupo','".$row[0]."')";
						if(!in_array($str,$_SESSION['materias_str'])) {
								array_push($_SESSION['materias'],array(Session::getUID(),$grupo,$row[0]));
								array_push($_SESSION['materias_str'],$str);
						}
						else {
								echo 201;
								exit;
						}
						error_log(implode(",",$_SESSION['materias_str']));
						
				}
				else {
						exit;
				}
		}
		else if(isset($_POST['stage']) && $_POST['stage']==1) {
				if(isset($_SESSION["locked"])&&$_SESSION["locked"]==true) {
						echo 203;
				}
						echo 777;
				$base = new Database();	$con = $base->connect();

				//$sql = "update Estudiante set Inscrito=1 where  idEstudiante='".Session::getUID()."'";
				//$query = $con->query($sql);
				//$row = $query->fetch_array();

				$sql = "insert into Inscrito_en values ".implode(",",$_SESSION['materias_str']);
				error_log($sql);
				$query = $con->query($sql);

				$sql = "update Estudiante set Inscrito=1 where idEstudiante='".Session::getUID()."'";
				$query = $con->query($sql);
				
				$_SESSION["locked"]=true;
				
		}
		else {
				$str = "ELSE: " . "[" . $_POST['stage'] . "]" . " " . implode(" ",$_SESSION['materias']);
				error_log($str);
		}
		
}
?>
