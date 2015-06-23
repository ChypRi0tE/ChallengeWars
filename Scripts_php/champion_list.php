<?php
require_once("Riotpi.php");
$_BDD_SERVER_ = "sql307.byethost12.com";
$_BDD_NAME_ = "b12_15918047_challengewars";
$_BDD_USER_ = "b12_15918047";
$_BDD_PASS_ = "ettasoeur42";

$bdd = new PDO('mysql:host='.$_BDD_SERVER_.';dbname='.$_BDD_NAME_, $_BDD_USER_, $_BDD_PASS_);

$api = new Riotpi('euw');
$history = $api->getStatic('champion');
//print_r($history['data']);
foreach ($history['data'] as $value) {
    //$bdd->query("INSERT INTO cw_lol_champions (id, name, cleanName) VALUES (".$value['id'].", '".$value['name']."', '".$value['name']."')");
	//echo "INSERT INTO cw_lol_champions (id, name, cleanName) VALUES (".$value['id'].", '".$value['name']."', '".$value['name']."')" . "<br />";
	}
?>