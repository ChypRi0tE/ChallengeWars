<?php
//Récupération de l'id du challenge en cours
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idChallenge = $_GET['id'];
    } else {
        header('Location: '.$_SITE_INDEX_);
    }
    
//Récupération du tab courant
//Défaut : Comments
    if (!empty($_GET['tab'])) {
        if (strtolower($_GET['tab']) == $_LINK_ENTRIES_)
            $tabPanel = 'Entries';
        else if (strtolower($_GET['tab']) == $_LINK_RANKING_)
            $tabPanel = 'Rankings';
        else
            $tabPanel = 'Comments';
    } else {
        $tabPanel = 'Comments';
    }
    
/* ---------------------------
 * VARIABLES------------------
 * ---------------------------
 */
    $_PAGENAME_ = "Challenge";
    $_PAGETITLE_ = "Challenge";
    $_PAGEHEAD_ = "Challenge";
    
    $_LIST_NB = 10;

/* ---------------------------
 * DATAS----------------------
 * ---------------------------
 */
    $bdd = connectDatabase();
    $ChallengeManager = new \Challenge\Manager\Challenge($bdd, $_TABLE_CHALLENGES_);
    $UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
    $CommentManager = new \Challenge\Manager\Comment($bdd, $_TABLE_COMMENTS_);
    $EntryManager = new \Challenge\Manager\Entry($bdd, $_TABLE_ENTRIES_);
    $StatManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
    
    $thisChallenge = $ChallengeManager->get($idChallenge);
    $thisUser = $UserManager->get($thisChallenge->getIdCreator());
    $listComments = $CommentManager->getForChallenge($idChallenge);
    $listEntry = $EntryManager->getRankingForChallenge($idChallenge);
    if ($thisChallenge->getStatus() == 2) {$thisWinner = $UserManager->getFromId($thisChallenge->getWinner());}

/* ---------------------------
 * FUNCTIONS------------------
 * ---------------------------
 */
//Vérifie si l'user est inscrit au challenge
    function isUserRegistered() {
      global $idChallenge, $EntryManager;
      
      if(($user = $_SESSION['currentUser']) == null) {return false;}
      return $EntryManager->getUserChallenge($idChallenge, $user->getId());
    }
    
//Inscription/Désinscription à un challenge
    if (isset($_POST['challengeJoin']) && !isUserRegistered()) {
        if(($user = $_SESSION['currentUser']) != null) {
            if($thisChallenge->getIsAdvanced()) {
                if ($user->getPoints() <= 100)
                    header("Location: ".$_SERVER['REQUEST_URI']);
                $user->setPoints($user->getPoints() - 100);
                $UserManager->update($user);
                $_SESSION['currentUser'] = $user;
            }
            $stat = $StatManager->getUserStats($user->getId());
            $data['idUser'] = $user->getId();
            $data['idChallenge'] = $idChallenge;
            $data['dateEntry'] = date("Y-m-d H:i:s", strtotime('+6 hours'));
            $data['points'] = 0;
            $entry = new \Challenge\Entry($data);
            $EntryManager->add($entry);
            $stat->setChallEntered($stat->getChallEntered() + 1);
            $StatManager->update($stat);
        }
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
    if (isset($_POST['challengeLeave']) && isUserRegistered()) {
        if(($user = $_SESSION['currentUser']) != null) {
            $stat = $StatManager->getUserStats($user->getId());
            $entry = $EntryManager->findUserChallenge($idChallenge, $user->getId());
            $EntryManager->remove($entry->getId());
            if($thisChallenge->getIsAdvanced()) {
                $user->setPoints($user->getPoints() + 100);
                $UserManager->update($user);
                $_SESSION['currentUser'] = $user;
            }
            $stat->setChallEntered($stat->getChallEntered() - 1);
            $StatManager->update($stat);
        }
        header("Location: ".$_SERVER['REQUEST_URI']);
    }

//Commentaire sur un challenge
    if (isset($_POST['challengeComment'])) {
        if(($user = $_SESSION['currentUser']) != null) {
            $stat = $StatManager->getUserStats($user->getId());
            $data['idUser'] = $user->getId();
            $data['idChallenge'] = $idChallenge;
            $data['datePost'] = date("Y-m-d H:i:s", strtotime('+6 hours'));
            $data['content'] = addslashes(htmlspecialchars($_POST['inputComment']));
            $entry = new \Challenge\Comment($data);
            $CommentManager->add($entry);
            $stat->setCommentPosted($stat->getCommentPosted() + 1);
            $StatManager->update($stat);
        }
        header("Location: ".$_SERVER['REQUEST_URI']);
    }