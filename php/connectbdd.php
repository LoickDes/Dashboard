<?php

/*
try{
	$bdd=new PDO('mysql:host=localhost;dbname=db-desbuloi','usr-desbuloi',')qOL(T0VWI7j');
	}
	catch (Exception $e){
		die('Erreur :'.$e->getMessage());
	}
*/


try{
$bdd=new PDO('mysql:host=localhost;dbname=dashboard','root','');
}
catch (Exception $e){
	die('Erreur :'.$e->getMessage());
}

?>