<?php
if(Session::issetUID()){
		$student = new Student($_POST['id'],'','','','','','');
		$student->delete();
}
?>
