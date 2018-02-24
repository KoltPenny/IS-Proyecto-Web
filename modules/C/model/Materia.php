<?php
class Materia {

		public static $tablename = "Materia";

		function __construct($unidadap,$unidadacad,$hrs_prac,$hrs_teo,$tipoasig,$nombrem,$creditos,$nivel){
				$this->unidadap = preg_replace("/[^a-zA-Z0-9]+/","", $unidadap);
				$this->unidadacad = preg_replace("/[^a-zA-Z0-9\\x{00C0}-\\x{024F}\\s]+/u","", $unidadacad);
				$this->hrs_prac = (float)preg_replace("/[^0-9\\.]+/","", $hrs_prac);
				$this->hrs_teo = (float)preg_replace("/[^0-9\\.]+/","", $hrs_teo);
				$this->tipoasig = $tipoasig;
				$this->nombrem = preg_replace("/[^a-zA-Z0-9\\x{00C0}-\\x{024F}\\s]+/u","", $nombrem);
				$this->creditos = (float)preg_replace("/[^0-9\\.]+/","", $creditos);
				$this->nivel = $nivel;
		}
		
		public function add(){
				$sql = "insert into ".self::$tablename." (UnidadAp,UnidadAcad,hrs_prac,hrs_teo,tipoAsig,nombreM,Creditos,Nivel) values ";
				$sql .= "('$this->unidadap','$this->unidadacad','$this->hrs_prac','$this->hrs_teo','$this->tipoasig','$this->nombrem','$this->creditos','$this->nivel')";
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
				$sql = "delete from ".self::$tablename." where UnidadAp='$this->unidadap'";
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
				$sql .= "UnidadAcad='$this->unidadacad',hrs_prac='$this->hrs_prac',hrs_teo='$this->hrs_teo', ";
				$sql .= "nombreM='$this->nombrem', Creditos='$this->creditos', Nivel='$this->nivel' ";
				$sql .= "where UnidadAp='$this->unidadap'";
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
