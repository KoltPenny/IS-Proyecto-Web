<?php
if(Session::issetUID()){
		$user = new Student(
				$_POST['id'],
				$_POST['nPila'],
				$_POST['aPater'],
				$_POST['aMater'],
				"",
				"",
				$_POST['email']);
		$user->update();
}
?>
