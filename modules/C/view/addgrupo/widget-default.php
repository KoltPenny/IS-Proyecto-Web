<?php
if(Session::issetUID()){
		$user = new Group(
				$_POST['nombreG']);
		$user->add();
}
?>
