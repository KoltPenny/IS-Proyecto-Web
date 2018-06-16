<?php
$thing = $_GET['id'];
$base = new Database();	$con = $base->connect();
$sql = "select COLUMN_NAME,COLUMN_TYPE from information_schema.columns where TABLE_SCHEMA = 'agencias' and TABLE_NAME = '$thing'";
$query = $con->query($sql);
$rows = null;
if(!$query){error_log(mysqli_error($con));exit;}
error_log($sql);
while($row = $query->fetch_array()){
		$rows[]=$row;
}
if(count($rows)==0) {
		echo "error";
		exit;
}
foreach($rows as $key=>$row) {
		//echo '["'.$row[0].'","'.$row[1].'"]';
		//xif($key>0&&$key<count($rows)-1) echo ",";
		echo "<option name='".$row[1]."'>".$row[0]."</option>";
}
?>
