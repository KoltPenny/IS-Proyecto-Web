<?php
if(Session::issetUID()){
		$student = new Student(
				$_POST['id'],
				$_POST['nPila'],
				$_POST['aPater'],
				$_POST['aMater'],
				$_POST['type'],
				$_POST['pass'],
				$_POST['email']);
		error_log($_POST['id']);
		$student->add();
}
?>
