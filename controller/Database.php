<?php
class Database {
		public static $db;
		public static $con;
		
		function __construct(){
				$this->user="root";
				$this->pass="rootpass";
				$this->host="localhost";
				$this->database="saes";
		}

		function connect(){
				self::$con = new mysqli($this->host,$this->user,$this->pass,$this->database);
				self::$con->set_charset("utf8");
				return self::$con;
		}

		public static function getCon(){
				if(self::$con==null && self::$db==null){
						self::$db = new Database();
						self::$con = self::$db->connect();
				}
				return self::$con;
		}
}
?>
