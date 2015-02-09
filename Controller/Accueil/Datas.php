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

    $nextChallenge = $ChallengeManager->getNext();
    $listChallenge = $ChallengeManager->getOngoing();
    $listFeaturedChallenge = $ChallengeManager->getFeatured();