<?php
if(Session::getUID()=="") {
		$type = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['type']);
		$agen = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['agen']);
		$user = preg_replace("/[^a-zA-Z0-9]+/","", $_POST['usr_id']);
		$pass = hash('sha1',preg_replace("/[^a-zA-Z0-9\\.]+/","", $_POST['password']));
		$base = new Database();
		$con = $base->connect();
		
		$sql="select nombreClave from Agente where hash='$pass' and idAgente='$user' and nombreAgencia='$agen'";
		
		error_log($sql);
		$query = $con->query($sql);
		if(!$query){error_log(mysqli_error($con));exit;}
		$found = false;
		$userid ="";
		$username = null;
		$proftype=null;
		$tipo=null;
		
		if($r = $query->fetch_array()){
				$username = $r['nombreClave'];						
				$userid = $user;
		}

		$sql="select tipo from Agente_tipo where nombreAgencia='$agen' and idAgente='$userid' and tipo='$type'";
		
		error_log($sql);
		$query = $con->query($sql);
		if($query==NULL){error_log(mysqli_error($con));return "failed";}
		//if()

		if($r = $query->fetch_array()){
				$found = true;
				$tipo = $r['tipo'];						
				$userid = $user;
		}
		
		if($found==true) {
				
				echo "success";
				$_SESSION['agen'] = $agen;
				Session::setUID($user);
				Session::setUNM($username);
				header('Content-Type: text/html; charset=utf-8');
				switch($type){
						case '0':
								echo "test";
								Session::setUT("campo");
								header("Location: index.php?view=campo");
								break;
						case '1':
								Session::setUT("logistica");
								header("Location: index.php?view=logistica");
								break;
						case '2':
								Session::setUT("admin");
								header("Location: index.php?view=admin");
								break;
				}
		}
		else {
				echo "failed";
		}
}
?>
