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

    function  debugTop($string) {
        global $_DEBUG_;

        if ($_DEBUG_)
            echo "<strong style=\"color:black\">[DEBUG]</strong> <span style=\"color:red\">".$string."</span><br />";
    }

    function  cleanEntries() {
        debugTop("Cleaning entries....");
        global $EntryManager, $ChallengeManager, $UserManager;
        
        $list = $EntryManager->getAll();
        $n = 0;
        for ($i = 0; !empty($list[$i]); $i++) {
            $chall = $ChallengeManager->get($list[$i]->getIdChallenge());
            if ($chall == null) {
                debug('Entry #'.$list[$i]->getId().' deleted: challenge does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                $EntryManager->remove($list[$i]->getId());
                $n++;
            }
            $user = $UserManager->get($list[$i]->getIdUser());
            if ($user == null) {
                debug('Entry #'.$list[$i]->getId().' deleted: user does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                $EntryManager->remove($list[$i]->getId());
                $n++;
            }
        }
        debug("Entries refreshed: ".$i." entries inspected, deleted ".$n."<br />");
    }
    function  cleanComments() {
        debugTop("cleaning comments...");
        global $CommentManager, $ChallengeManager, $UserManager;
        
        $list = $CommentManager->getAll();
        $n = 0;
        for ($i = 0; !empty($list[$i]); $i++) {
            $chall = $ChallengeManager->get($list[$i]->getIdChallenge());
            if ($chall == null) {
                debug('Comment #'.$list[$i]->getId().' deleted: challenge does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                $CommentManager->remove($list[$i]->getId());
                $n++;
            }
            $user = $UserManager->get($list[$i]->getIdUser());
            if ($user == null) {
                debug('Comment #'.$list[$i]->getId().' deleted: user does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                $CommentManager->remove($list[$i]->getId());
                $n++;
            }
        }
        debug("Comments refreshed: ".$i." comments inspected, deleted ".$n."<br />");
      
    }
    function  cleanFriends() {
        debugTop("Cleaning friends...");
        global $FriendManager, $UserManager;
        $list = $FriendManager->getAll();
        $n = 0;
        for ($i = 0; !empty($list[$i]);$i++) {
            $user = $UserManager->get($list[$i]->getUserId());
            $friend = $UserManager->get($list[$i]->getFriendId());
            if ($user == null) {
                debug('Friendship #'.$list[$i]->getId().' deleted: user does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                $FriendManager->remove($list[$i]->getId());
                $n++;
            } else if ($friend == null) {
                debug('Friendship #'.$list[$i]->getId().' deleted: friend does not exist.<pre>'.print_r($list[$i], 1).'</pre>');
                $FriendManager->remove($list[$i]->getId());
                $n++;
            }
        }
        debug("Friends refreshed: ".$i." friendships inspected, deleted ".$n."<br />");
    }
    function  cleanChallenges() {
    global $ChallengeManager, $EntryManager, $UserManager;
    debugTop("Cleaning challenges...");
    $listChallenge = $ChallengeManager->getOngoing();
    for ($i = 0; !empty($listChallenge[$i]); $i++) {
        debug("-Processing Challenge ".$listChallenge[$i]->getId());
        if (time() > strtotime($listChallenge[$i]->getDateEnd())) {
            debug("---Challenge is over");
            $listEntries = $EntryManager->getRankingForChallenge($listChallenge[$i]->getId());
            if (!empty($listEntries[0])) {
                $listChallenge[$i]->setWinner($listEntries[0]->getIdUser());
                $winner = $UserManager->getFromId($listEntries[0]->getIdUser());
                $winner->setPoints($winner->getPoints() + 300);
            }
            for ($i = 1; !empty($listEntries[$i]); $i++) {
                $user = $UserManager->getFromId($listEntries[$i]->getIdUser());
                if ($i == 1) {
                    $user->setPoints($user->getPoints() + 200);
                } else if ($i == 2) {
                    $user->setPoints($user->getPoints() + 100);
                } else {
                    $user->setPoints($user->getPoints() + 20);
                }
                $UserManager->update($user);
            }
            $listChallenge[$i]->setStatus(2);
            $ChallengeManager->update($listChallenge[$i]);
            debug("-----Challenge closed, ".((!empty($listEntries[0]))?"winner is user ".$listEntries[0]->getIdUser():"no winner found"));
        } else {
            debug("---Challenge not ended yet");
        }
        debug("-Challenge number ".$listChallenge[$i]->getId()." updated<br />");
    }
}

    function  gameCounts($game, $challenge) {
        $ret = true;
        if (strtotime($game->getMatchCreation()) < strtotime($challenge->getDateCreation())) {
            debug("Invalid Game: Played before challenge creation.");
            $ret = false;
        }
        if (strtotime($game->getMatchCreation()) > strtotime($challenge->getDateEnd())) {
            debug("Invalid Game: Played after challenge end.");
            $ret = false;
        }
        return true;
        return $ret;
    }


    function  refreshUsers() {
    debugTop("Refreshing users...");
    global $UserManager, $StatsManager, $ChallengeManager, $CommentManager, $EntryManager, $SummonerManager, $MatchManager, $FriendManager;

    $list = $UserManager->getAll();
    for ($i = 0; !empty($list[$i]); $i++) {
        $uid = $list[$i]->getId();
        debug("Updating stats for user ".$uid."...");
        $stats = $StatsManager->getUserStats($uid);
        $stats->setChallCreated($ChallengeManager->getNbCreated($uid));
        $stats->setChallEntered($EntryManager->getNbForUser($uid));
        $stats->setChallWon($ChallengeManager->getNbWon($uid));
        $stats->setCommentPosted($CommentManager->getNbForUser($uid));
        $stats->setNbFriends($FriendManager->getNbForUser($uid));

        debug('Stats updated for user #' . $uid . '.<pre>' . print_r($stats, 1) . '</pre>');
        $StatsManager->update($stats);

        if ($list[$i]->getIsValidated()) {
            $summoner = $SummonerManager->getFromId($uid);
            $summoner->setNbGames($MatchManager->getNbForUser($uid));
            debug('Summoner for user #' . $uid . ' updated.<pre>' . print_r($summoner, 1) . '</pre>');
            $SummonerManager->update($summoner);
        }
        debug("Stats for user " . $uid . " successfully updated<br />");
    }
}
    function  refreshChallenges(){
    debugTop("Refreshing challenges...");
    global $ChallengeManager, $EntryManager, $MatchManager;
    $listCurrent = $ChallengeManager->getOngoing();
    for ($i = 0; !empty($listCurrent[$i]); $i++) {
        debug("-Challenge number ".$listCurrent[$i]->getId());
        $listEntries = $EntryManager->getForChallenge($listCurrent[$i]->getId());
        $champ = $listCurrent[$i]->getChampion();
        $type = $listCurrent[$i]->getType();

        for ($j = 0; !empty($listEntries[$j]); $j++) {
            debug("---Entry number ".$listEntries[$j]->getId()." from user ".$listEntries[$j]->getIdUser());
            if ($champ == 0)
                $listGames = $MatchManager->getFromUser($listEntries[$j]->getIdUser(), 'DESC');
            else
                $listGames = $MatchManager->getFromUserChampion($listEntries[$j]->getIdUser(), $champ);
            if (!$listGames) {
                debug("-----No game found for user ".$listEntries[$j]->getIdUser()." with champion ".$champ);
                $listEntries[$j]->setPoints(0);
            } else {
                $sCore = 0;
                for ($k = 0; !empty($listGames[$k]); $k++) {
                    debug("-----Game number ".$listGames[$k]->getId()." from user ".$listGames[$k]->getUserId());
                    $nbCalc = 0;
                    $nbGames = 0;
                    $time = 0;
                    $creeps = 0;
                    if (gameCounts($listGames[$k], $listCurrent[$i])){
                        $nbGames++;
                        if ($type == 1) { //Creep
                            $time += $listGames[$k]->getMatchDuration();
                            $creeps+= $listGames[$k]->getCreeps();
                        } else if ($type == 2) { //victory
                            if ($listGames[$k]->getVictory()) {$nbCalc++;}
                        } else { //kill
                            $nbCalc += $listGames[$k]->getKills();
                        }
                    }
                    if ($type == 1)$nbCalc = $creeps/$time;
                    $sCore += $nbCalc / $nbGames;
                    debug("-----Game number ".$listGames[$k]->getId()." parsed, user score: ".$sCore*100);
                }
                $listEntries[$j]->setPoints($sCore * 100);
            }
            $EntryManager->update($listEntries[$j]);
            debug("---updated");
        }
        debug("-Challenge number ".$listCurrent[$i]->getId()." updated<br />");
    }
}