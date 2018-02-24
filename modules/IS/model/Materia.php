<?php
class Materia {

		public static $tablename = "Materia";

		function __construct($unidadap,$unidadacad,$hrs_prac,$hrs_teo,$tipoasig,$nombrem,$creditos,$nivel){
				$this->unidadap = $unidadap;
				$this->unidadacad = $unidadacad;
				$this->hrs_prac = $hrs_prac;
				$this->hrs_teo = $hrs_teo;
				$this->tipoasig = $tipoasig;
				$this->nombrem = $nombrem;
				$this->creditos = $creditos;
				$this->nivel = $nivel;
		}

		public function add(){
				$sql = "insert into ".self::$tablename." (UnidadAp,UnidadAcad,hrs_prac,hrs_teo,tipoAsig,nombreM,Creditos,Nivel) values ";
				$sql .= "('$this->unidadap','$this->unidadacad','$this->hrs_prac','$this->hrs_teo','$this->tipoasig','$this->nombrem','$this->creditos','$this->nivel')";
				error_log($sql);
				Executor::doit($sql);
		}
		
		public static function delById($boleta){
				$sql = "delete from ".self::$tablename." where IdEstudiante=$boleta";
				Executor::doit($sql);
		}
		public function del(){
				$sql = "delete from ".self::$tablename." where IdEstudiante=$this->id";
				Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
		public function updateVal($column,$val){
				$sql = "update ".self::$tablename." set '$column'='$val' where id ='$this->boleta'";
				Executor::doit($sql);
		}
		
		public static function getByBoleta($boleta){
				$sql = "select * from ".self::$tablename." where IdEstudiante=\"$boleta\"";
				$query = Executor::doit($sql);
				$array = array();
				$cnt = 0;
				while($r = $query->fetch_array()){
						$array[$cnt] = new UserData();
						$array[$cnt]->boleta = $r['boleta'];
						$array[$cnt]->id = $r['id'];
						$array[$cnt]->name = $r['name'];
						$array[$cnt]->lastname = $r['lastname'];
						$array[$cnt]->email = $r['email'];
						$array[$cnt]->password = $r['password'];
						$array[$cnt]->created_at = $r['created_at'];
						$cnt++;
				}
				return $array;
		}

		/*
			 public static function getAll(){
			 $sql = "select * from ".self::$tablename;
			 $query = Executor::doit($sql);
			 $array = array();
			 $cnt = 0;
			 while($r = $query[0]->fetch_array()){
			 $array[$cnt] = new UserData();
			 $array[$cnt]->boleta = $r['boleta'];
			 $array[$cnt]->id = $r['id'];
			 $array[$cnt]->name = $r['name'];
			 $array[$cnt]->lastname = $r['lastname'];
			 $array[$cnt]->email = $r['email'];
			 $array[$cnt]->username = $r['username'];
			 $array[$cnt]->is_active = $r['is_active'];
			 $array[$cnt]->is_admin = $r['is_admin'];
			 $array[$cnt]->is_student = $r['is_student'];
			 $array[$cnt]->is_prof = $r['is_prof'];
			 $array[$cnt]->password = $r['password'];
			 $array[$cnt]->created_at = $r['created_at'];
			 $cnt++;
			 }
			 return $array;
			 }


			 public static function getLike($q){
			 $sql = "select * from ".self::$tablename." where name like '%$q%'";
			 $query = Executor::doit($sql);
			 $array = array();
			 $cnt = 0;
			 while($r = $query[0]->fetch_array()){
			 $array[$cnt] = new UserData();
			 $array[$cnt]->boleta = $r['boleta'];
			 $array[$cnt]->id = $r['id'];
			 $array[$cnt]->name = $r['name'];
			 $array[$cnt]->mail = $r['mail'];
			 $array[$cnt]->password = $r['password'];
			 $array[$cnt]->created_at = $r['created_at'];
			 $cnt++;
			 }
			 return $array;
			 }
		 */
}

?>
