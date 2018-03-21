<?php

$user="m";
$pass="soyespia";
$host="localhost";
$database="agencias";

$con = new mysqli($host,$user,$pass,$database);
$con->set_charset("utf8");
/*
$row = 1;
if (($handle = fopen("agencias.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
  			$sql = "";
  			$hash;
  			$sql="insert into Agencia values('".$data[0]."','".$data[1]."')";
  			echo $sql;
  			$con->query($sql);
  			echo($con->error);
    }
    fclose($handle);
}
*/
$row = 1;
if (($handle = fopen("agentes.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
  			$sql = "";
  			$hash;
  			$sql="insert into Agente values('".$data[0]."','".$data[1]."','".$data[2]."','".hash('sha1',$data[3])."')";
  			echo $sql;
  			$con->query($sql);
  			echo($con->error);
    }
    fclose($handle);
}

$row = 1;
/* if (($handle = fopen("csv/hrs.csv", "r")) !== FALSE) {
 *     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
 *         $num = count($data);
 *         echo "<p> $num fields in line $row: <br /></p>\n";
 * 				$sql = "";
 * 				$hash;
 * 				$sql="insert into G_tiene_M values('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."')";
 * 				echo $sql;
 * 				$con->query($sql);
 * 				error_log($con->error);
 *     }
 *     fclose($handle);
 * }
 * */
?>
