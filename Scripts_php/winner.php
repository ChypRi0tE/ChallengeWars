<?php
    include_once("../Controller/GlobalVariables.php");
    include_once("../Controller/Website.php");

	$bdd = connectDatabase();

$listEndedChallenges = [];
 
 
$listEndedChallenges['idEntries'][0] = 26;
$listEndedChallenges['idEntries'][1] = 17;
$listEndedChallenges['idEntries'][2] = 1;
$listEndedChallenges['idChallenge'] = 3;
$listEndedChallenges['type'] = 2;
$listEndedChallenges['dateCreation'] = date("d-m-Y H:i", 1425417467 + 3600*5);

$max_users = [];
foreach($listEndedChallenges['idEntries'] as $key) {
	    $query = "SELECT * FROM " . $_TABLE_SUMMONERS_HISTORY_ . " WHERE userId = " . $key;
    $q = $bdd->query($query);
    $kills = [];
	$user_tab = [];
    while ($match = $q->fetch()) {
		if ($listEndedChallenges['type'] == 1){
			$kills[] = $match['kills'];
			}
		else if ($listEndedChallenges['type'] == 2){
			$kills[] = $match['creeps'];
			}
		}
		
		$user_tab['id'] = $key;
		$user_tab['max'] = max($kills);
	$max_users[] =$user_tab; 
}
	$val = 0;
	foreach($max_users as $max){
		if ($max['max'] > $val)
			$val = $max['max'];
		
	}
	echo $val;
	echo '</br>';
	$winner = [];
	foreach($max_users as $win) {
		if ($win['max'] == $val)
			$winner[] = $win['id'];
	}
	print_r($winner);
?>