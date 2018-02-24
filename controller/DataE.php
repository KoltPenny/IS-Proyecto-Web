<?php
class DataE {
		public static $tablename = "Empleado";

		public function __construct(){
				$this->nEmp = "";
				$this->nombre = "";
				$this->ap = "";
				$this->am = "";
				$this->email = "";
				$this->tipo = "";
		}

		public static function getById($id){
				$sql = "select * from ".self::$tablename." where nEmp=$id";
				$query = Executor::doit($sql);
				$found = null;
				$data = new DataE();
				while($r = $query->fetch_assoc()){
						$data->nEmp = $r['nEmp'];
						$data->nombre = $r['nomPila'];
						$data->ap = $r['ApPater'];
						$data->am = $r['ApMater'];
						$data->email = $r['email'];
						$data->tipo = $r['Tipo'];
						$found = $data;
						break;
				}
				return $found;
		}


}

?>
