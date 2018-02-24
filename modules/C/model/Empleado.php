<?php
class Empleado {

		public static $tablename = "Empleado";
		public static $tableprof = "Profesor";

		function __construct($nemp,$npila,$apater,$amater,$type,$hash,$email){
				$this->nemp = preg_replace("/[^a-zA-Z0-9]+/","", $nemp);
				$this->npila = preg_replace("/[^a-zA-Z0-9\\x{00C0}-\\x{024F}\\s]+/u","", $npila);
				$this->apater = preg_replace("/[^a-zA-Z0-9\\x{00C0}-\\x{024F}\\s]+/u","", $apater);
				$this->amater = preg_replace("/[^a-zA-Z0-9\\x{00C0}-\\x{024F}\\s]+/u","", $amater);
				$this->type = $type;
				$this->hash = hash('sha1',preg_replace("/[^a-zA-Z0-9]+/","",$hash));
				$this->email = preg_replace("/[^a-zA-Z0-9@\\.]+/","", $email);
		}

		public function add(){
				$sql = "insert into ".self::$tablename." (nEmp,nomPila,ApPater,ApMater,Tipo,Hash,email) values ";
				$sql .= "('$this->nemp','$this->npila','$this->apater','$this->amater','$this->type','$this->hash','$this->email')";
				$query=null;
				$query=Executor::doit($sql);

				if($this->type=='P' || $this->type=='A') {
						$sql = "insert into ".self::$tableprof." (nEmp) values "."('$this->nemp')";
						$query_ = null;
						$query_=Executor::doit($sql);
						if($query>999){
								if($query==1062) { echo $query; exit; }
								echo "error";
								exit;
						}
				}
				
				if($query>999){
						if($query==1062) { echo $query; exit; }
						echo "error";
						exit;
				}
				else echo "success";
		}

		public function delete(){
				$sql = "delete from ".self::$tablename." where nEmp='$this->nemp'";
				$query=null;
				if(Session::getUT()=='admin' && Session::getUID()!="") {
						if(Session::getUID()==$this->nemp) {
								error_log("Don't do that shit");
								echo "denied";
								exit;
						}
				}
				$query=Executor::doit($sql);
				error_log($query);
				if($query>999 || $query==null){
						if($query==1062) { echo $query; exit; }
						echo "failed";
						error_log("failed");
						exit;
				}
				else echo "success";
		}

		public function update(){
				$sql  = "update ".self::$tablename." set ";
				$sql .= "nomPila='$this->npila', ApPater='$this->apater', ApMater='$this->amater', ";
				$sql .= "Tipo='$this->type', email='$this->email' ";
				$sql .= "where nEmp='$this->nemp'";
				error_log($sql);
				$query=null;
				$query=Executor::doit($sql);
				if($query>999){
						if($query==1062) { echo $query; exit; }
						echo "failed";
						exit;
				}
				else echo "success";
		}
}
?>
