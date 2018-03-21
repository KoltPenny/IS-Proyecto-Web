<?php
$base = new Database();
$con = $base->connect();

$sql="select nombreAgencia from Agencia";

$query = $con->query($sql);

while($row = $query->fetch_array()){
		$rows[]=$row[0];
}
foreach($rows as $row) {
		echo "<option>".$row."</option>";
}
?>
