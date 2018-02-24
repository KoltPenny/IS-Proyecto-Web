<?php
if(Session::issetUID()){
		$empleado = new Empleado($_POST['id'],'','','','','','');
		$empleado->delete();
}
?>
