<?php
class Database {
		public static $db;
		public static $con;
		
		function __construct(){
				$this->user="m";
				$this->pass="soyespia";
				$this->host="localhost";
				$this->database="agencias";
		}

		function connect(){
				self::$con = new mysqli($this->host,$this->user,$this->pass,$this->database);
				self::$con->set_charset("utf8");
				return self::$con;
		}

		function connect_specific($user,$pass,$host,$database){
				self::$con = new mysqli($host,$user,$pass,$database);
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
