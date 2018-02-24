<?php
if(Session::getUID()=="") {
		$type = $_POST['type'];
		$user = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['usr_id']);
		$pass = hash('sha1',preg_replace("/[^a-zA-Z0-9\\.]+/","", $_POST['password']));
		$base = new Database();
		$con = $base->connect();
		$sql='';
		
		switch($type) {
				case '0':
						$sql = "select NomPila,ApPaterno,ApMaterno from Estudiante where
(IdEstudiante= '".$user."' and Hash='".$pass."')";
						$sql = trim(preg_replace('/\s+/', ' ', $sql));
						break;
				case '1':
						$sql = "select nomPila,ApPater,ApMater,tipo from Empleado where
(nEmp='".$user."' and Hash='".$pass."' and (tipo='P' or tipo='A'))";
						$sql = trim(preg_replace('/\s+/', ' ', $sql));
						break;
				case '2':
						$sql = "select nomPila,ApPater,ApMater from Empleado where
(nEmp='".$user."' and Hash='".$pass."' and tipo='G')";
						break;
						
		}
		error_log($sql);
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));exit;}
		$found = false;
		$userid ="";
		$username = null;
		$proftype=null;
		if($r = $query->fetch_array()){
				$found = true ;
				if($type=='0') {
						$username = $r['NomPila']." ".$r['ApPaterno']." ".$r['ApMaterno'];						
				}
				else if ($type=='1' || $type=='2') {
						$username = $r['nomPila']." ".$r['ApPater']." ".$r['ApMater'];
						$proftype = $r['tipo'];
				}
				$userid = $user;
				
		}
		if($found==true) {
				
				echo "success";
				Session::setUID($user);
				Session::setUNM($username);
				header('Content-Type: text/html; charset=utf-8');
				switch($type){
						case '0':
								echo "test";
								Session::setUT("student");
								header("Location: /saes/index.php?view=student");
								break;
						case '1':
								$_SESSION['prof_type'] = $proftype;
								Session::setUT("profesor");
								header("Location: /saes/index.php?view=profesor");
								break;
						case '2':
								Session::setUT("admin");
								header("Location: /saes/index.php?view=admin");
								break;
				}
		}
		else {
				echo "failed";
		}
}
?>
