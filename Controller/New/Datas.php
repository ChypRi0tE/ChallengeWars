<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 14/02/2015
 * Time: 13:15
 */


$listChampions = array(array(),array());

$api = new RiotAPi('euw');

$history = $api->getStatic('champion');

foreach ($history['data'] as $value) {
		array_push($listChampions[0], $value['id']);
		array_push($listChampions[1], $value['name']);
		}
 ?>