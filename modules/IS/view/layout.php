<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<script src="js/control.js"></script>
		<!-- script src="js/debugging.js"></script-->
		<title>SAES</title>
	</head>
	<?php if(Session::getUID()!=""):?>
		<?php View::load($_SESSION['user_type']); ?>
		<script>processNeutral("<?php echo Session::getUNM();?>")</script>
		<!--ul>
				 <li><a href="index.php?view=configuration">Configuracion</a></li>
				 <li><a href="logout.php">Salir</a></li>
				 <?php if(false):?><li><a href="index.php?view=users">Usuarios </a></li><?php endif;?>
		</ul-->
	<?php else:?>
		<?php	View::load("login"); ?>
	<?php endif; ?>
	
</html>
<?php
if(isset($_SESSION['log_status'])) { ob_clean();echo $_SESSION['log_status'];	unset($_SESSION['log_status']); }
if(isset($_SESSION['db_log'])) {ob_clean();echo $_SESSION['db_log'];unset($_SESSION['db_log']);}
?>
