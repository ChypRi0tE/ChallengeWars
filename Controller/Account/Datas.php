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

if ($_SESSION['currentUser']->getIsValidated()) {
    $SummonerManager = new \Summoner\Manager\Summoner($bdd, $_TABLE_SUMMONERS_);
    $thisSummoner = $SummonerManager->getFromId($_SESSION['currentUser']->getId());
}