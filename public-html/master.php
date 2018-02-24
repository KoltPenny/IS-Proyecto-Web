<?php
$user="id3602365_root";
$pass="rootpass";
$host="localhost";
$database="id3602365_saes";

$con = new mysqli($host,$user,$pass,$database);
$con->set_charset("utf8");

$sql="insert into Empleado values ('0000000001','Thomas','Neo','Anderson','G','".hash('sha1','wakeupneo')."','one@matrix.com')";
$con->query($sql);
echo $con->error;

?>
