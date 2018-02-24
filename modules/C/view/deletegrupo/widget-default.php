<?php
if(Session::issetUID() && Session::getUT()=="profesor"){
		$grupo = new Group($_POST['nomGrupo']);
		$grupo->delete();
}
?>
