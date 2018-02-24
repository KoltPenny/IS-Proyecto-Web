<?php
class Grupo {

		public static $tablename = "G_tiene_M";

		function __construct($nomGrupo,$UnidadAp,$cupo,$disponibilidad,$lunes,$martes,$miercoles,$jueves,$viernes){
				$this->nomGrupo = $nomGrupo;
				$this->UnidadAp = $UnidadAp;
				$this->cupo = $cupo;
				$this->disponibilidad = $disponibilidad;
				$this->lunes = $lunes;
				$this->martes = $martes;
				$this->miercoles = $miercoles;
				$this->jueves = $jueves;
				$this->viernes = $viernes;
		}
		
		public function add(){
				$sql = "insert into ".self::$tablename." (nomGrupo,UnidadAp,cupo,disponibilidad,lunes,martes,miercoles,jueves,viernes) values ";
				$sql .= "('$this->nomGrupo','$this->UnidadAp','$this->cupo','$this->disponibilidad','$this->lunes','$this->martes','$this->miercoles','$this->jueves','$this->viernes')";
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
				$sql = "delete from ".self::$tablename." where UnidadAp='$this->UnidadAp' and nomGrupo='$this->nomGrupo'";
				$query=null;
				if($this->unidadap!="Selecciona clave de materia")	$query=Executor::doit($sql);
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
				$sql .= "('$this->nomGrupo','$this->UnidadAp','$this->cupo','$this->lunes','$this->martes','$this->miercoles','$this->jueves','$this->viernes')";
				$sql .= "where UnidadAp='$this->UnidadAp' and nomGrupo='$this->nomGrupo'";
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
		public function getByGroup(){
				$sql  = "select * from ".self::$tablename." nomGrupo='$this->nomGrupo' ";
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
		public function getAll(){
				$sql  = "select * from ".self::$tablename;
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
