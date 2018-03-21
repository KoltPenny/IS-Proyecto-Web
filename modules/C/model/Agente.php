<?php
class Agente {

		public static $tablename = "Agente";
		public static $query = null;

		function __construct($nomagencia,$idagente,$nomclave,$hash,$tipo){
				$this->nomagencia = preg_replace("/[^a-zA-Z0-9\s]+/","", $nomagencia);
				$this->idagente = preg_replace("/[^a-zA-Z0-9]+/","", $idagente);
				$this->nomclave = preg_replace("/[^a-zA-Z0-9\s]+/","", $nomclave);
				$this->hash = hash('sha1',preg_replace("/[^a-zA-Z0-9]+/","",$hash));
				$this->tipo = preg_replace("/[^a-zA-Z0-9\s]+/","", $tipo);
		}

		public function add(){
				$sql = "insert into ".self::$tablename." (nombreAgencia,idAgente,nombreClave,hash) values ";
				$sql .= "('$this->nomagencia','$this->idagente','$this->nomclave','$this->hash')";

				self::$query=Executor::doit($sql);
				if($query>999){ if($query==1062) { echo $query; exit; }	echo "error";	exit;	}

				$sql = "insert into Agente_tipo (nombreAgencia,idAgente,tipo) values ";
				$sql .= "('$this->nomagencia','$this->idagente','$this->tipo')";

				self::$query=Executor::doit($sql);
				if(self::$query>999){
						error_log(self::$query."[over 999]");
						if(self::$query==1062) {
								echo self::$query;
								error_log(self::$query."[1062]");
								exit;
						}	echo "error";	exit;	}	else echo "success"; error_log(self::$query."[wtf]");
		}

		public function delete(){
				$sql = "delete from ".self::$tablename." where nombreAgencia='$this->nomagencia' and idAgente='$this->idagente'";
				if(Session::getUT()=='admin' && Session::getUID()!="") {
						if(Session::getUID()==$this->idagente && $_SESSION['agen'] == $this->nomagencia) {
								error_log("Don't do that shit");
								echo "denied";
								exit;
						}
				}
				//error_log($sql);
				self::$query=Executor::doit($sql);
				if(self::$query>999 || self::$query==null){ if(self::$query==1062) { echo self::$query; exit; }
						echo "failed";
						exit;
				}
				else echo "success";
				error_log($sql);
		}

		public function update(){
				$sql  = "update ".self::$tablename." set ";
				$sql .= "nombreClave='$this->nomclave' ";
				$sql .= "where nombreAgencia='$this->nomagencia' and idAgente='$this->idagente'";
				self::$query=Executor::doit($sql);
				if(self::$query>999){	if(self::$query==1062) { echo self::$query; exit; }	echo "error";	exit;	}

				error_log($sql);
				
				self::$query=null;
				$sql  = "update Agente_tipo set ";
				$sql .= "tipo='$this->tipo' ";
				$sql .= "where nombreAgencia='$this->nomagencia' and idAgente='$this->idagente'";
				self::$query=Executor::doit($sql);
				if(self::$query>999){	if(self::$query==1062) { echo self::$query; exit; }	echo "error";	exit;	}
				else echo "success";
				//error_log(self::$query);
				error_log($sql);
		}
}

?>
