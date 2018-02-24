<?php

if(!isset($_SESSION["cart"])){


	$horario = array("nombreG"=>$_POST["nombreG"],"UnidadAp"=>$_POST["UnidadAp"],"profesor"=>$_POST["profesor"],"lunes"=>$_POST["lunes"],"martes"=>$_POST["martes"],"miercoles"=>$_POST["miercoles"],"jueves"=>$_POST["jueves"],"viernes"=>$_POST["viernes"]);
error_log(horario['profesor']);
	$_SESSION["cart"] = array($horario);


	$cart = $_SESSION["cart"];
}else {
$found = false;
$cart = $_SESSION["cart"];
$index=0;
foreach($cart as $c){
	if($c["UnidadAp"]==$_POST["UnidadAp"]){
		$found=true;
		break;
	}
	$index++;
}
if($found){
	$horario = array("nombreG"=>$_POST["nombreG"],"UnidadAp"=>$_POST["UnidadAp"],"profesor"=>$_POST["profesor"],"lunes"=>$_POST["lunes"],"martes"=>$_POST["martes"],"miercoles"=>$_POST["miercoles"],"jueves"=>$_POST["jueves"],"viernes"=>$_POST["viernes"]);
	$cart[$index] = $horario;
	$_SESSION["cart"] = $cart;	
}else{
    $nc = count($cart);
	$horario = array("nombreG"=>$_POST["nombreG"],"UnidadAp"=>$_POST["UnidadAp"],"profesor"=>$_POST["profesor"],"lunes"=>$_POST["lunes"],"martes"=>$_POST["martes"],"miercoles"=>$_POST["miercoles"],"jueves"=>$_POST["jueves"],"viernes"=>$_POST["viernes"]);
	$cart[$nc] = $horario;
	$_SESSION["cart"] = $cart;
}


/*
foreach($cart as $c){
	if($c["materia"]==$_POST["materia"]){
		echo "found";
		$found=true;
		break;
	}
	$index++;
}

if($found==true){
	$cart[$index]= array("nombreG"=>$_POST["nombreG"],"UnidadAp"=>$_POST["UnidadAp"],"profesor"=>$_POST["profesor"],"lunes"=>$_POST["lunes"],"martes"=>$_POST["martes"],"miercoles"=>$_POST["miercoles"],"jueves"=>$_POST["jueves"],"viernes"=>$_POST["viernes"]);
	$_SESSION["cart"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$horario = array("nombreG"=>$_POST["nombreG"],"UnidadAp"=>$_POST["UnidadAp"],"profesor"=>$_POST["profesor"],"lunes"=>$_POST["lunes"],"martes"=>$_POST["martes"],"miercoles"=>$_POST["miercoles"],"jueves"=>$_POST["jueves"],"viernes"=>$_POST["viernes"]);
	$cart[$nc] = $horario;
	$_SESSION["cart"] = $cart;
}*/
}
?>
