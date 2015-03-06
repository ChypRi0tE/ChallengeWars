<?php
/* ---------------------------
 * VARIABLES------------------
 * ---------------------------
 */
    $_PAGENAME_ = "Update";
    $_PAGETITLE_ = "Update";
    $_PAGEHEAD_ = "Update";
    $_DEBUG_    = true;

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
    $SummonerManager = new \Summoner\Manager\Summoner($bdd, $_TABLE_SUMMONERS_);
    $api = new RiotApi('euw');

    if (isLogged()) {
        $thisUser = $UserManager->get($_SESSION['currentUser']->getId());
        $thisStats = $StatsManager->getUserStats($_SESSION['currentUser']->getId());
    }
 
 
/* ---------------------------
 * FUNCTIONS------------------
 * ---------------------------
 */
    function  refreshEntries() {
        debug("Refreshing entries....");
        global $EntryManager, $ChallengeManager, $UserManager;
        
        $list = $EntryManager->getAll();
        $n = 0;
        for ($i = 0; !empty($list[$i]); $i++) {
            $chall = $ChallengeManager->get($list[$i]->getIdChallenge());
            if ($chall == null) {
                debug('Entry #'.$list[$i]->getId().' deleted: challenge does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                //$EntryManager->remove($list[$i]->getId());
                $n++;
            }
            $user = $UserManager->get($list[$i]->getIdUser());
            if ($user == null) {
                debug('Entry #'.$list[$i]->getId().' deleted: user does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                //$EntryManager->remove($list[$i]->getId());
                $n++;
            }
        }
        debug("Entries refreshed: ".$i." entries inspected, deleted ".$n."<br />");
    }
    
    function  refreshComments() {
        debug("Refreshing comments...");
        global $CommentManager, $ChallengeManager, $UserManager;
        
        $list = $CommentManager->getAll();
        $n = 0;
        for ($i = 0; !empty($list[$i]); $i++) {
            $chall = $ChallengeManager->get($list[$i]->getIdChallenge());
            if ($chall == null) {
                debug('Comment #'.$list[$i]->getId().' deleted: challenge does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                //$CommentManager->remove($list[$i]->getId());
                $n++;
            }
            $user = $UserManager->get($list[$i]->getIdUser());
            if ($user == null) {
                debug('Comment #'.$list[$i]->getId().' deleted: user does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                //$CommentManager->remove($list[$i]->getId());
                $n++;
            }
        }
        debug("Comments refreshed: ".$i." comments inspected, deleted ".$n."<br />");
      
    }
    
    function  refreshUser($user) {
        $uid = $user->getId();
        debug("Updating stats for user ".$uid."...");
        global $StatsManager, $ChallengeManager, $CommentManager, $EntryManager, $SummonerManager, $MatchManager;
        
        $stats = $StatsManager->getUserStats($uid);
        $stats->setChallCreated($ChallengeManager->getNbCreated($uid));
        $stats->setChallEntered($EntryManager->getNbForUser($uid));
        $stats->setChallWon($ChallengeManager->getNbWon($uid));
        $stats->setCommentPosted($CommentManager->getNbForUser($uid));
        
        debug('Stats updated for user #'.$uid.'.<pre>'.print_r($stats, 1).'</pre>');
        //$StatsManager->update($stats);
        
        if ($user->getIsValidated()) {
            $summoner = $SummonerManager->getFromId($uid);
            $summoner->setNbGames($MatchManager->getNbForUser($uid));
            debug('Summoner for user #'.$uid.' updated.<pre>'.print_r($summoner, 1).'</pre>');
            //$SummonerManager->update($summoner);
        }
        debug("Updating stats for user ".$uid." successfully updated");
    }
    
    function  refreshChallenges(){}