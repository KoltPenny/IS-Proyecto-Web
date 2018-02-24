<?php
class UserData {
		public static $tablename = "user";



		public function Userdata(){
				$this->boleta = "";
				$this->name = "";
				$this->lastname = "";
				$this->email = "";
				$this->image = "";
				$this->password = "";
				$this->created_at = "NOW()";
		}

		public function add(){
				$sql = "insert into user (boleta,name,lastname,username,email,is_admin,is_student,is_prof,password,created_at) ";
				$sql .= "value (\"$this->boleta\",\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->email\",\"$this->is_admin\",\"$this->is_student\",\"$this->is_prof\",\"$this->password\",$this->created_at)";
		}

		public static function delById($id){
				$sql = "delete from ".self::$tablename." where id=$id";
				Executor::doit($sql);
		}
		public function del(){
				$sql = "delete from ".self::$tablename." where id=$this->id";
				Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
		public function update(){
				$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",username=\"$this->username\",lastname=\"$this->lastname\",is_active=\"$this->is_active\",is_admin=\"$this->is_admin\",is_student=\"$this->is_student\",is_prof=\"$this->is_prof\" where id=$this->id";
				Executor::doit($sql);
		}

		public function update_passwd(){
				$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
				Executor::doit($sql);
		}

/*
		public static function getById($id){
				$sql = "select * from ".self::$tablename." where id=$id";
				$query = Executor::doit($sql);
				$found = null;
				$data = new UserData();
				while($r = $query[0]->fetch_array()){
						$data->boleta = $r['boleta'];
						$data->id = $r['id'];
						$data->name = $r['name'];
						$data->lastname = $r['lastname'];
						$data->username = $r['username'];
						$data->is_admin = $r['is_admin'];
						$data->is_student = $r['is_student'];
						$data->is_prof = $r['is_prof'];
						$data->is_active = $r['is_active'];
						$data->email = $r['email'];
						$data->password = $r['password'];
						$data->created_at = $r['created_at'];
						$found = $data;
						break;
				}
				return $found;
		}
*/
		public static function getByBoleta($boleta){
				$sql = "select * from ".self::$tablename." where boleta=\"$boleta\"";
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
						$array[$cnt]->password = $r['password'];
						$array[$cnt]->created_at = $r['created_at'];
						$cnt++;
				}
				return $array;
		}


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


}

?>
