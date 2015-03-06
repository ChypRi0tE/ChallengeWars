<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 14/02/2015
 * Time: 13:15
 */


$bdd = connectDatabase();
$UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
$ChallengeManager = new \Challenge\Manager\Challenge($bdd, $_TABLE_CHALLENGES_);
$StatManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
$api = new RiotAPi('euw');

$listChampions = array(array(),array());


$history = $api->getStatic('champion');

    foreach ($history['data'] as $value) {
		array_push($listChampions[0], $value['id']);
		array_push($listChampions[1], $value['name']);
    }
	
 if (isset($_POST['do-new'])) {
   //print_r($_POST);
        if (empty($_POST['inputType']) || empty ($_POST['inputChampion']) || empty ($_POST['inputLevel']) || empty ($_POST['inputName'])) {
			  return;
        }
        $_POST['inputDescription'] = htmlspecialchars($_POST['inputDescription']);
		$_POST['inputName'] = htmlspecialchars($_POST['inputName']);
	 
	 if(($user = $_SESSION['currentUser']) != null) {
		$stat = $StatManager->getUserStats($user->getId());

	  $data = [];
    $data['title'] = $_POST['inputName'];
		$data['champion'] = $_POST['inputChampion'];
		if ($_POST['inputType'] == "victory") {
			$data['type'] = 2;
		}
		else if ($_POST['inputType'] == "creep") {
			$data['type'] = 1;
		}
		else {
			$data['type'] = 3;
		}
		
		$data['description'] = $_POST['inputDescription'];
		$data['dateCreation'] = date("Y-m-d H:i:s", strtotime("+6 hours"));
		$data['dateEnd'] = date("Y-m-d H:i:s", strtotime("+7 days"));
		$data['idCreator'] = $user->getId();
		$data['idPrize'] = 1;
		
		if ($_POST['inputLevel'] == "starter") {
			$data['isAdvanced'] = 0;
		  $data['cost'] = 0;
		}
		else {
		  $data['isAdvanced'] = 1;
		  $data['cost'] = 100;
		}
		
		$data['status'] = 1;
		$data['image'] = null;
		$data['winner'] = 0;
  
    $usr = new \Challenge\Challenge($data);
    $ChallengeManager->add($usr);
		$stat->setChallCreated($stat->getChallCreated() + 1);
    $StatManager->update($stat);
		header('Location: '.$_SITE_INDEX_);
	 }
 }
 ?>