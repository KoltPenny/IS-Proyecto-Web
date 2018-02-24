<?php
if(Session::issetUID()){
		$user = new Empleado(
				$_POST['id'],
				$_POST['nPila'],
				$_POST['aPater'],
				$_POST['aMater'],
				$_POST['type'],
				$_POST['pass'],
				$_POST['email']);
		$user->add();
}
?>
