<?php
if(Session::issetUID()){
		$agente = new Agente($_POST['agen'],$_POST['id'],'','','');
		$agente->delete();
}
?>
