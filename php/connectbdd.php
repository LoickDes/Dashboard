<?php

try{
$bdd=new PDO('mysql:host=localhost;dbname=dashboard','root','');
}
catch (Exception $e){
	die('Erreur :'.$e->getMessage());
}

?>
