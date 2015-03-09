<?php
if (isset($_POST['type'])) {
    synchronize($_POST['id']);
}
//Récupération de l'user affiché
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
    } else {
        header('Location: '.$_SITE_INDEX_);
    }
//Récupération du tab courant
//Défaut: Created
    if (!empty($_GET['tab'])) {
        if (strtolower($_GET['tab']) == $_LINK_WON_)
            $tabPanel = 'Won';
        else if (strtolower($_GET['tab']) == $_LINK_ENTERED_)
            $tabPanel = 'Entries';
        else if (strtolower($_GET['tab']) == $_LINK_UCOMMENT_)
            $tabPanel = 'Comments';
        else if (strtolower($_GET['tab']) == $_LINK_HISTORY_)
            $tabPanel = 'History';
        else if (strtolower($_GET['tab']) == $_LINK_FRIENDS_)
            $tabPanel = 'Friends';
        else
            $tabPanel = 'Created';
    } else {
        $tabPanel = 'Created';
    }

/* ---------------------------
 * VARIABLES------------------
 * ---------------------------
 */
    $_PAGENAME_ = "User";
    $_PAGETITLE_ = "User";
    $_PAGEHEAD_ = "ChypRiotE";
    
    $_LIST_NB = 10;

/* ---------------------------
 * DATAS----------------------
 * ---------------------------
 */
    $bdd = connectDatabase();
    $UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
    $ChallengeManager = new \Challenge\Manager\Challenge($bdd, $_TABLE_CHALLENGES_);
    $CommentManager = new \Challenge\Manager\Comment($bdd, $_TABLE_COMMENTS_);
    $EntryManager = new \Challenge\Manager\Entry($bdd, $_TABLE_ENTRIES_);
    $StatsManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
    $MatchManager = new \Summoner\Manager\Match($bdd, $_TABLE_SUMMONERS_HISTORY_);
    $FriendManager = new \Member\Manager\Friend($bdd, $_TABLE_USERS_FRIENDS_);
    $api = new RiotApi('euw');

    $thisUser = $UserManager->getFromName($name);
    if ($thisUser == null) {header('Location: '.$_SITE_INDEX_);}
    $idUser = $thisUser->getId();
    $thisStats = $StatsManager->getUserStats($idUser);
    $dateToday = new DateTime();
 
    if ($tabPanel == "Created")
        $listChallenge = $ChallengeManager->getCreated($idUser);
    else if ($tabPanel == "Entries")
        $listChallenge = $ChallengeManager->getEntered($idUser);
    else if ($tabPanel == "Won")
        $listChallenge = $ChallengeManager->getWon($idUser);
    else if ($tabPanel == "Comments")
        $listComments = $CommentManager->getForUser($idUser);
    else if ($tabPanel == "History")
        $listMatches = $MatchManager->getFromUser($idUser, 'DESC');
    else if ($tabPanel == "Friends")
        $listFriends = $FriendManager->getFromUser($idUser);
        
    if ($thisUser->getIsValidated()) {
        $SummonerManager = new \Summoner\Manager\Summoner($bdd, $_TABLE_SUMMONERS_);
        $thisSummoner = $SummonerManager->getFromId($idUser);
    }
 
/* ---------------------------
 * FUNCTIONS------------------
 * ---------------------------
 */
//Récupération du rôle de l'utilisateur
    function    getUserRole($rank) {
        switch ($rank) {
            case 1:
                return "Admin";
            case 0:
                return "Member";
        }
        return null;
    }
//Récupération du nombre de challenge/comment/entry/matchs de l'utilisateur
    function    getResults($tab) {
        global $thisStats, $MatchManager, $idUser;

        switch ($tab) {
            case "Created":
                return $thisStats->getChallCreated();
            case "Won":
                return $thisStats->getChallWon();
            case "Entries":
                return $thisStats->getChallEntered();
            case "Comments":
                return $thisStats->getCommentPosted();
            case "Friends":
                return $thisStats->getNbFriends();
            case "History":
                return $MatchManager->getNbForUser($idUser);
        }
        return 0;
    }
//Récupération du header de la page pour les breadcrumbs
    function    getPageHeading($tab) {
        global $thisUser, $_LINK_USER_;
        
        $head = "";
        switch ($tab) {
            case "Created":
                $head = "Created";
                $tas = "created";
                break;
            case "Won":
                $head = "Won";
                $tas = "won";
                break;
            case "Entries":
                $head = "Entered";
                $tas = "entered";
                break;
            case "Comments":
                $head = "Comments";
                $tas = "comments";
                break;
            case "History":
                $head = "History";
                $tas = "History";
                break;
            case "Friends":
                $head = "Friends";
                $tas = "Friends";
                break;
        }
        return '<a href="'.$_LINK_USER_.'/'.$thisUser->getUsername().'/'.$tas.'">'.$head.'</a>';
    }
//Vérification de l'amitié
    function  isFriend($user, $current) {
        global $FriendManager;
        
        return $FriendManager->getFriendship($user, $current);
    }
//Ajout/Suppression d'amis
    if (isset($_POST['add-friend'])) {
        $data = [];
        $data['userId'] = $_SESSION['currentUser']->getId();
        $data['friendId'] = $thisUser->getId();
        $data['dateAdd'] = date("Y-m-d H:i");
        $f = new \Member\Friend($data);
        $stats = $StatsManager->getUserStats($_SESSION['currentUser']->getId());
        $stats->setNbFriends($stats->getNbFriends()+1);
        $StatsManager->update($stats);
        $FriendManager->add($f);
        
        header('Location: '.$_SERVER['REDIRECT_URL']);
    }
    if (isset($_POST['remove-friend'])) {
        $FriendManager->removeFriendship($_SESSION['currentUser']->getId(), $thisUser->getId());
        $stats = $StatsManager->getUserStats($_SESSION['currentUser']->getId());
        $stats->setNbFriends($stats->getNbFriends()-1);
        $StatsManager->update($stats);
        header('Location: '.$_SERVER['REDIRECT_URL']);
    }

//Synchronisation avec riot
    if (isset($_POST['sync'])) {
        synchronize($_SESSION['currentUser']->getId());
        header('Location: '.$_SERVER['REDIRECT_URL']);
    }