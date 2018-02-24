<?php
if(Session::issetUID() && Session::getUT()=="profesor"){
		$materia = new Materia($_POST['unidadap'],'','','','','','','');
		$materia->delete();
}
?>
