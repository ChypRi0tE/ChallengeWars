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

  if (isset($_POST['challengeJoin']) && !isUserRegistered()) {
    if(($user = $_SESSION['currentUser']) != null) {
    $data['idUser'] = $user->getId();
    $data['idChallenge'] = $idChallenge;
    $data['dateEntry'] = date("Y-m-d H:i:s", strtotime('+6 hours'));
    $entry = new \Challenge\Entry($data);
    $EntryManager->add($entry);
    }
    header("Location: ".$_SERVER['REQUEST_URI']);
  }
  if (isset($_POST['challengeLeave']) && isUserRegistered()) {
    if(($user = $_SESSION['currentUser']) != null) {
    $entry = $EntryManager->findUserChallenge($idChallenge, $user->getId());
    $EntryManager->remove($entry->getId());
    }
    header("Location: ".$_SERVER['REQUEST_URI']);
  }
  if (isset($_POST['challengeComment'])) {
    if(($user = $_SESSION['currentUser']) != null) {
      $data['idUser'] = $user->getId();
      $data['idChallenge'] = $idChallenge;
      $data['datePost'] = date("Y-m-d H:i:s", strtotime('+6 hours'));
      $data['content'] = htmlspecialchars($_POST['inputComment']);
      $entry = new \Challenge\Comment($data);
      $comment = $CommentManager->add($entry);
    }
    header("Location: ".$_SERVER['REQUEST_URI']);
  }