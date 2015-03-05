<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 11:02
 */
$bdd = connectDatabase();
$UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
$ChallengeManager = new \Challenge\Manager\Challenge($bdd, $_TABLE_CHALLENGES_);
$CommentManager = new \Challenge\Manager\Comment($bdd, $_TABLE_COMMENTS_);
$EntryManager = new \Challenge\Manager\Entry($bdd, $_TABLE_ENTRIES_);
$StatsManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
$MatchManager = new \Summoner\Manager\Match($bdd, $_TABLE_SUMMONERS_HISTORY_);
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

if ($thisUser->getIsValidated()) {
    $SummonerManager = new \Summoner\Manager\Summoner($bdd, $_TABLE_SUMMONERS_);
    $thisSummoner = $SummonerManager->getFromId($idUser);
}