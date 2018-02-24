<?php

$user="i0000000root";
$pass="rootpass@000";
$host="localhost";
$database="0000000saes";

$con = new mysqli($host,$user,$pass,$database);
$con->set_charset("utf8");

$row = 1;
/* if (($handle = fopen("pruebas.csv", "r")) !== FALSE) {
 *     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
 *         $num = count($data);
 *         echo "<p> $num fields in line $row: <br /></p>\n";
 *         $row++;
 *   			$sql = "";
 *   			$nombre = "";
 *   			$apellidop;
 *   			$apellidom;
 *   			$hash;
 *         for ($c=0; $c < $num; $c++) {
 * 						if($c==$num-2) {
 * 								$sql=$sql."'".hash('sha1',$data[$c])."',";
 * 						}
 * 						else if($c==$num-1){
 *   							$sql=$sql."'".$data[$c]."'";
 *   					}
 *   					else {
 *   							$sql=$sql."'".$data[$c]."',";
 *   					}
 *         }
 *   			//$sql = $sql."'".hash('sha1',strtolower($hash))."',"."'".strtolower($hash)."@ipn.mx'";
 *   			$sql = "insert into Empleado values($sql)";
 *   			echo $sql;
 *   			$con->query($sql);
 *   			echo $con->error;
 *   			$nombre=$apellidop=$apellidom='';
 *     }
 *     fclose($handle);
 * }*/

$row = 1;
if (($handle = fopen("imparte.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
  			$sql = "";
  			$hash;
  			$sql="insert into Imparte_en values('".$data[0]."','".$data[2]."','".$data[4]."')";
  			echo $sql;
  			//$con->query($sql);
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
