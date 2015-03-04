<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 04/03/2015
 * Time: 01:30
 */
include_once("../Controller/Website/GlobalVariables.php");
require_once("RiotApi.php");

if (isset($_POST['verify'])) {
    if (empty($_POST['inputAccount'])) {
        echo "{\"error\":\"empty summoner name\"}";
    } else if (empty($_POST['userId'])) {
        echo "{\"error\":\"empty user id, received: ".$_POST['userId']."\"}";
    } else {
        $api = new RiotApi('euw');
        try {
            $bdd = new PDO('mysql:host='.$_BDD_SERVER_.';dbname='.$_BDD_NAME_, $_BDD_USER_, $_BDD_PASS_);
        } catch (Exception $e) {
            die('<strong>Error :</strong> ' . $e->getMessage());
        }
        $uid = $_POST['userId'];
        $name = str_replace(' ', '', $_POST['inputAccount']);
        $id = $api->getSummonerId($name);
        usleep(9000000);
        $listRunes = $api->getSummoner($id, 'runes')['pages'];
        $found = false;
        for ($i = 0; !empty($listRunes[$i]); $i++) {
            if ($listRunes[$i]['name'] == $_POST['inputCode']) {
                $bdd->query("INSERT INTO cw_summoners
                     (userId, summonerId, summonerName, dateValidation, lastSync)
                    VALUES (".$uid.",
                    ".$id.",
                    '".$name."',
                    '".date("Y-m-d H:i", strtotime("+6 hours"))."',
                    '".date("Y-m-d H:i", strtotime("+6 hours"))."')
                  ");
                $bdd->query("UPDATE cw_users
                SET isValidated = 1,
                    avatar = ". $api->getSummoner($id)['profileIconId']."
                WHERE userId = ".$uid);
                $found = true;
            }
        }
        echo $found ? "{\"synchronisation\":\"success\"}" : "{\"error\":\"rune page not found\"}";
    }
} else {
    echo "{\"error\":\"invalid request\"}";
}