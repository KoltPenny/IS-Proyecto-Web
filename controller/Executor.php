<?php
class Executor {
		public static function doit($sql){
				$con = Database::getCon();
				$query = $con->query($sql);
				if(!$query){
						error_log(mysqli_error($con));
						return $con->errno;
				}
				else {
						return $query;
				}
		}
}
?>
