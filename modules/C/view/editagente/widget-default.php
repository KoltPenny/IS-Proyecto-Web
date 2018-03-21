<?php
error_log("out");
if(Session::getUT()=="admin" && Session::getUID()!="" && isset($_POST['id'])){
		error_log("in");
		$user = new Agente(
				$_POST['agen'],
				$_POST['id'],
				$_POST['name'],
				"",
				$_POST['type']);
		$user->update();
}
?>
