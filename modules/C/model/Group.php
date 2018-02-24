<?php
class Group {

		public static $tablename = "Grupo";

		function __construct($nombreG){
				$this->nombreG = $nombreG;
		}
		
		public function add(){
				$sql = "insert into ".self::$tablename." (nomGrupo) values ";
				$sql .= "('$this->nombreG')";
				$query=null;
				$query=Executor::doit($sql);
				if($query>999){
						if($query==1062) { 
							echo $query;
							exit; 
						}
						echo "error";
						exit;
				}
				else echo "success";
		}
		
		public function delete(){
				$sql = "delete from ".self::$tablename." where nomGrupo='$this->nombreG'";
				$query=null;
				$query=Executor::doit($sql);

				if($query>999 || $query==null){
						if($query==1062) {
							echo $query;
							unset($_SESSION["cart"]);
							exit;
						}
						echo "failed";
						error_log("failed");
						exit;
				}
				else echo "success";
		}
}

?>
