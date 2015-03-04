<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 14/02/2015
 * Time: 13:15
 */

$listChampions = array();
require_once("Scripts_php/RiotApi.php");

$api = new RiotAPi('euw');
$history = $api->getStatic('champion');
//print_r($history['data']);
foreach ($history['data'] as $value) {
	array_push($listChampions, $value['name']);
	}
 usort($listChampions, "strcasecmp");
?>