<?php
class DataS {
		public static $tablename = "Estudiante";

		public function __construct(){
				$this->boleta = "";
				$this->nombre = "";
				$this->ap = "";
				$this->am = "";
				$this->email = "";
				$this->UnidadAp = "";
				$this->calif = "";
				$this->periodo = "";
				$this->fecha = "";
				$this->tipo_curse = "";
				$this->estado = "";
		}

		public static function getById($id){
				$sql = "select * from ".self::$tablename." where idEstudiante=$id";
				$query = Executor::doit($sql);
				$found = null;
				$data = new DataS();
				while($r = $query->fetch_assoc()){
						$data->boleta = $r['idEstudiante'];
						$data->nombre = $r['NomPila'];
						$data->ap = $r['ApPaterno'];
						$data->am = $r['ApMaterno'];
						$data->email = $r['email'];
						$data->estado = $r['Status'];
						$found = $data;
						break;
				}
				return $found;
		}

		public static function getCursado($id){
				$sql = "select * from E_ha_cursado_M where idEstudiante=$id";
				$query = Executor::doit($sql);
				$array = array();
				$cnt = 0;
				while($r = $query->fetch_assoc()){
						$array[$cnt] = new DataS();
						$array[$cnt]->unidadAp = $r['UnidadAp'];
						$array[$cnt]->calif = $r['calif'];
						$array[$cnt]->periodo = $r['periodo'];
						$array[$cnt]->fecha = $r['fecha'];
						$array[$cnt]->tipo = $r['tipo_curse'];
						$cnt++;
				}
				return $array;
		}


}

?>
