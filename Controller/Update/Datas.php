<?php echo test;
    $bdd = connectDatabase();
    
    $UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
    $ChallengeManager = new \Challenge\Manager\Challenge($bdd, $_TABLE_CHALLENGES_);
    $CommentManager = new \Challenge\Manager\Comment($bdd, $_TABLE_COMMENTS_);
    $EntryManager = new \Challenge\Manager\Entry($bdd, $_TABLE_ENTRIES_);
    $StatsManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
    $MatchManager = new \Summoner\Manager\Match($bdd, $_TABLE_SUMMONERS_HISTORY_);
    $FriendManager = new \Member\Manager\Friend($bdd, $_TABLE_USERS_FRIENDS_);
    $api = new RiotApi('euw');

    if (isLogged()) {
        $thisUser = $UserManager->get($_SESSION['currentUser']->getId());
        $thisStats = $StatsManager->getUserStats($_SESSION['currentUser']->getId());
    }
    function test() {echo"lol";}
    function  refreshEntries() {
      global $EntryManager, $ChallengeManager, $UserManager;
      echo "test";
      $list = $EntryManager->getAll();
      for ($i = 0; !empty($list[$i]); $i++) {
        $chall = $ChallengeManager->get($list[$i]->getIdChallenge());
        if ($chall == null) {
          echo 'Entry deleted: challenge does not exist.<pre>',print_r($list[$i]),'</pre>';
          //$EntryManager->remove($list[$i]->getId());
        }
        $user = $UserManager->get($list[$i]->getIdUser());
        if ($user == null) {
          echo 'Entry deleted: user does not exist.<pre>',print_r($list[$i]),'</pre>';
          //$EntryManager->remove($list[$i]->getId());
        }
      }
    }
    
    function  refreshUser($user) {
      $uid = $user->getId();
      $stats = $StatsManager->getUserStats($uid);
      $stats->setChallCreated($ChallengeManager->getNbCreated($uid));
      $stats->setChallEntered();
    }