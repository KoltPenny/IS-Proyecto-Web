<?php
if(Session::issetUID()){
		$user = new Materia(
				$_POST['unidadap'],
				$_POST['unidadacad'],
				$_POST['hrs_prac'],
				$_POST['hrs_teo'],
				$_POST['tipoasig'],
				$_POST['nombrem'],
				$_POST['creditos'],
				$_POST['nivel']);
		$user->update();
}
?>
