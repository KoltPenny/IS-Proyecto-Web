<?php

/*
	 Esta funcion contiene el nombre de los identificadores que se usaran como variables de session
	 y tambien los setters y getters correspondientes.
 */

class Session{
		//USER ID
		public static function setUID($uid){ $_SESSION['user_id'] = $uid; }
		public static function unsetUID(){ if(isset($_SESSION['user_id'])) unset($_SESSION['user_id']);	}
		public static function issetUID(){ if(isset($_SESSION['user_id'])) return true;	else return false; }
		public static function getUID(){ if(isset($_SESSION['user_id'])) return $_SESSION['user_id'];	else return false; }

		//USER TYPE
		public static function setUT($utype){	$_SESSION['user_type'] = $utype; }
		public static function unsetUT(){	if(isset($_SESSION['user_type']))	unset($_SESSION['user_type']); }
		public static function issetUT(){	if(isset($_SESSION['user_type'])) return true; else return false;	}
		public static function getUT(){	if(isset($_SESSION['user_type'])) return $_SESSION['user_type']; else return false;	}

		//USER NAME
		public static function setUNM($utype){	$_SESSION['user_name'] = $utype; }
		public static function unsetUNM(){	if(isset($_SESSION['user_name']))	unset($_SESSION['user_name']); }
		public static function issetUNM(){	if(isset($_SESSION['user_name'])) return true; else return false;	}
		public static function getUNM(){	if(isset($_SESSION['user_name'])) return $_SESSION['user_name']; else return false;	}
}

?>
