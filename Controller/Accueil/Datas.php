<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 09/02/2015
 * Time: 23:41
 */
    $bdd = connectDatabase();
    
    $ChallengeManager = new \Challenge\Manager\Challenge($bdd, $_TABLE_CHALLENGES_);
    $UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
    $CommentManager = new \Challenge\Manager\Comment($bdd, $_TABLE_COMMENTS_);
    $EntryManager = new \Challenge\Manager\Entry($bdd, $_TABLE_ENTRIES_);
    $StatsManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);

    $nextChallenge = $ChallengeManager->getNext();
    $nextUser = $UserManager->get($nextChallenge->getIdCreator());
    $listChallenge = $ChallengeManager->getOngoing();
    $listFeaturedChallenge = $ChallengeManager->getAdvanced();

    if (isLogged()) {
        $thisUser = $UserManager->get($_SESSION['currentUser']->getId());
        $thisStats = $StatsManager->getUserStats($_SESSION['currentUser']->getId());
    }