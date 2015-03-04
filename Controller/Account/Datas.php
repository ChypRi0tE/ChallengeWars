<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 02/03/2015
 * Time: 16:07
 */

$bdd = connectDatabase();
$UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
$StatsManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
$SummonerManager = new \Summoner\Manager\Summoner($bdd, $_TABLE_SUMMONERS_);

if ($_SESSION['currentUser']->getIsValidated()) {
    $thisSummoner = $SummonerManager->getFromId($_SESSION['currentUser']->getId());
} else {
    $verifyCode = !empty($_POST['inputCode']) ? $_POST['inputCode'] : substr(md5(rand()), 0, 7);
}

if (isset($_POST['verify'])) {
    if (empty($_POST['inputAccount'])) {
        echo "erreur";
    } else {
        if (!empty($_POST['userId'])) {$uid = $_POST['userId'];} else {$uid =$_SESSION['currentUser']->getId();}
        $api = new RiotApi('euw');
        $name = str_replace(' ', '', $_POST['inputAccount']);
        $id = $api->getSummonerId($name);
        $listRunes = $api->getSummoner($id, 'runes')['pages'];
        for ($i = 0; !empty($listRunes[$i]); $i++) {
            if ($listRunes[$i]['name'] == $_POST['inputCode']) {
                $data = [];
                $data['userId'] = $uid;
                $data['summonerId'] = $id;
                $data['summonerName'] = $name;
                $data['dateValidation'] = date("Y-m-d H:i", strtotime("+6 hours"));
                $data['lastSync'] = date("Y-m-d H:i", strtotime("+6 hours"));
                $sum = new \Summoner\Summoner($data);
                $SummonerManager->add($sum);
                $usr = $UserManager->get($uid);
                $usr->setIsValidated(true);
                $usr->setAvatar($api->getSummoner($id)['profileIconId']);
                $UserManager->update($usr);
                $_SESSION['currentUser'] = $usr;
                $_SESSION['currentSummoner'] = $sum;
            }
        }
        header('Location: '.$_SITE_INDEX_);
    }
}
if (isset($_POST['sync'])) {
    synchronize($_SESSION['currentUser']->getId());
    header('Location: '.$_LINK_ACCOUNT_."/".$_LINK_SYNC_);
}