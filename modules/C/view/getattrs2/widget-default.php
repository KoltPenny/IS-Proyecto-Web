<?php
$thing = $_GET['id'];
$base = new Database();	$con = $base->connect();
$sql = "select COLUMN_NAME from information_schema.columns where TABLE_SCHEMA = 'agencias' and TABLE_NAME = '$thing'";

$query = $con->query($sql);
$rows = array();

error_log($sql);
if(!$query){error_log(mysqli_error($con));exit;}

while($row = $query->fetch_row()){ $rows[]=$row; }

if(count($rows)==0) {	echo "101";	exit; }

else echo json_encode($rows);

?>
