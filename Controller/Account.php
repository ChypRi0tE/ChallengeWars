<?php
//Redirection si l'utilisateur n'est pas log
//TODO : message d'erreur
    if (!isLogged()) {header('Location: '. $_SITE_INDEX_); }

//Récupération du tab courant
//Défaut : Synchro
    if (!empty($_GET['tab'])) {
        if (strtolower($_GET['tab']) == $_LINK_INBOX_)
            $tabPanel = 'Inbox';
        else
            $tabPanel = 'Synchronisation';
    } else {
        $tabPanel = 'Synchronisation';
    }

/* ---------------------------
 * VARIABLES------------------
 * ---------------------------
 */
    $_PAGENAME_ = "Account";
    $_PAGETITLE_ = "Account";

/* ---------------------------
 * DATAS----------------------
 * ---------------------------
 */
    $bdd = connectDatabase();
    $UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
    $StatsManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
    $SummonerManager = new \Summoner\Manager\Summoner($bdd, $_TABLE_SUMMONERS_);
    $MessageManager = new \Member\Manager\Message($bdd, $_TABLE_MESSAGES_);

    $listMessages = $MessageManager->getForUser($_SESSION['currentUser']->getId());
    $listUsers = $UserManager->getAll();
 
/* ---------------------------
 * FUNCTIONS------------------
 * ---------------------------
 */
//Récuperation du Summoner si compte lié, sinon création d'un code pour la validation
    if ($_SESSION['currentUser']->getIsValidated()) {
        $thisSummoner = $SummonerManager->getFromId($_SESSION['currentUser']->getId());
    } else {
        $verifyCode = !empty($_POST['inputCode']) ? $_POST['inputCode'] : substr(md5(rand()), 0, 7);
    }
 
 //Liaison compte LoL et compte Website
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
            header('Location: '.$_LINK_ACCOUNT_."/".$_LINK_SYNC_);
        }
    }
//Synchronisation de l'user LoL avec le compte Website
    if (isset($_POST['sync'])) {
        synchronize($_SESSION['currentUser']->getId());
        header('Location: '.$_LINK_ACCOUNT_."/".$_LINK_SYNC_);
    }