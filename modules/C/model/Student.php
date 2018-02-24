<?php
class Student {

		public static $tablename = "Estudiante";

		function __construct($boleta,$npila,$apater,$amater,$status,$hash,$email){
				$this->boleta = preg_replace("/[^a-zA-Z0-9]+/","", $boleta);
				$this->npila = preg_replace("/[^a-zA-Z0-9\s]+/","", $npila);
				$this->apater = preg_replace("/[^a-zA-Z0-9\s]+/","", $apater);
				$this->amater = preg_replace("/[^a-zA-Z0-9\s]+/","", $amater);
				$this->status = $status;
				$this->hash = hash('sha1',preg_replace("/[^a-zA-Z0-9]+/","",$hash));
				$this->email = preg_replace("/[^a-zA-Z0-9@\\.]+/","", $email);
		}

		public function add(){
				$sql = "insert into ".self::$tablename." (IdEstudiante,NomPila,ApPaterno,ApMaterno,Status,Hash,email) values ";
				$sql .= "('$this->boleta','$this->npila','$this->apater','$this->amater','$this->status','$this->hash','$this->email')";
				$query=null;
				$query=Executor::doit($sql);
				if($query>999){
						if($query==1062) { echo $query; exit; }
						echo "error";
						exit;
				}
				else echo "success";
		}

		public function delete(){
				$sql = "delete from ".self::$tablename." where IdEstudiante='$this->boleta'";
				$query=null;
				error_log($sql);
				$query=Executor::doit($sql);
				//error_log($query);
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
				$sql .= "NomPila='$this->npila', ApPaterno='$this->apater', ApMaterno='$this->amater' ,";
				$sql .= "email='$this->email' ";
				$sql .= "where IdEstudiante='$this->boleta'";

				error_log($sql);
				
				$query=null;
				$query=Executor::doit($sql);
				if($query>999){
						if($query==1062) { echo $query; exit; }
						echo "error";
						exit;
				}
				else echo "success";
		}
}

?>
