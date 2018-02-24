<?php
class Profesor {

		public static $tablename = "Imparte_en";

		function __construct($nEmp,$nomGrupo,$UnidadAp){
				$this->nEmp = $nEmp;
				$this->nomGrupo = $nomGrupo;
				$this->UnidadAp = $UnidadAp;
		}
		
		public function add(){
				$sql = "insert into ".self::$tablename." (nEmp,nomGrupo,UnidadAp) values ";
				$sql .= "('$this->nEmp','$this->nomGrupo','$this->UnidadAp')";
				$query=null;
				$query=Executor::doit($sql);
				error_log($sql);
				if($query>999){
						if($query==1062) { echo $query; unset($_SESSION["cart"]); exit; }
						return false;
						exit;
				}
				else return true;
		}
		
		public function delete(){
				$sql = "delete from ".self::$tablename." where nEmp='$this->nEmp' and nomGrupo='$this->nomGrupo'";
				$query=null;
				$query=Executor::doit($sql);
				if($query>999 || $query==null){
						if($query==1062) { echo $query; unset($_SESSION["cart"]); exit; }
						echo "failed";
						error_log("failed");
						exit;
				}
				else echo "success";
		}
}

?>
