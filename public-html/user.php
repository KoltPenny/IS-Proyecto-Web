<?php
	session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="css/usr.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<script src="scripts/jquery.js"></script>
		<script src="scripts/welcome.js"></script>
	</head>
  <body>
		<?php if(!isset($_SESSION['usr']))
					echo "<script>$(document).ready(function(){window.location.href = 'index.php';});</script>";?>
		<div class="boundtest topbar row-10 col-full">
			<div class="boundtest row-full col-05">
				<img class="row-full col-full" src="imgs/burger.svg"/>
			</div>
			<div class="boundtest row-full col-70"></div>
			<div class="boundtest usrname row-full col-15"><p><?php echo $_SESSION['usr'];?></p></div>
			<div class="boundtest row-full col-10"></div>
			
		</div>
	</body>			
</html>
