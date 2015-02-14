<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 01:49
 */
$bdd = connectDatabase();
$ChallengeManager = new \Challenge\Manager\Challenge($bdd, $_TABLE_CHALLENGES_);
$UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
$CommentManager = new \Challenge\Manager\Comment($bdd, $_TABLE_COMMENTS_);
$EntryManager = new \Challenge\Manager\Entry($bdd, $_TABLE_ENTRIES_);


$thisChallenge = $ChallengeManager->get($idChallenge);
$thisUser = $UserManager->get($thisChallenge->getIdCreator());
$listComments = $CommentManager->getForChallenge($idChallenge);
$listEntry = $EntryManager->getForChallenge($idChallenge);