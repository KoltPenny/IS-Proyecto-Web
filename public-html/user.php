<?php
session_start();
$previous = "window.history.go(-1)";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<script src="scripts/jquery.js"></script>
		<script src="scripts/welcome.js"></script>
	</head>
  <body>
		<?php
          if(!isset($_SESSION['usr'])) echo "<button onclick='".$previous."'>BACK</button>";
          else echo "Welcome, ".$_SESSION['usr'];?>
	</body>			
</html>
