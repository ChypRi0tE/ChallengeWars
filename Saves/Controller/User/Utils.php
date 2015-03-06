<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 11:00
 */
include_once("Controller/User/Variables.php");

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $_GET['name'];
} else {
    header('Location: /');
}
if (!empty($_GET['tab'])) {
    if (strtolower($_GET['tab']) == $_LINK_WON_)
        $tabPanel = 'Won';
    else if (strtolower($_GET['tab']) == $_LINK_ENTERED_)
        $tabPanel = 'Entries';
    else if (strtolower($_GET['tab']) == $_LINK_UCOMMENT_)
        $tabPanel = 'Comments';
    else if (strtolower($_GET['tab']) == $_LINK_HISTORY_)
        $tabPanel = 'History';
    else
        $tabPanel = 'Created';
} else {
    $tabPanel = 'Created';
}

    function    getUserRole($rank) {
        switch ($rank) {
            case 1:
                return "Admin";
            case 0:
                return "Member";
        }
        return null;
    }
    function    getResults($tab) {
        global $thisStats;

        switch ($tab) {
            case "Created":
                return $thisStats->getChallCreated();
            case "Won":
                return $thisStats->getChallWon();
            case "Entries":
                return $thisStats->getChallEntered();
            case "Comments":
                return $thisStats->getCommentPosted();
            case "History":
                return 1;
        }
        return 0;
    }
    function    getPageHeading($tab) {
        global $thisUser, $_LINK_USER_;
        $head = "";
        switch ($tab) {
            case "Created":
                $head = "Created";
                $tas = "created";
                break;
            case "Won":
                $head = "Won";
                $tas = "won";
                break;
            case "Entries":
                $head = "Entered";
                $tas = "entered";
                break;
            case "Comments":
                $head = "Comments";
                $tas = "comments";
                break;
            case "History":
                $head = "History";
                $tas = "History";
                break;
        }
        return '<a href="'.$_LINK_USER_.'/'.$thisUser->getUsername().'/'.$tas.'">'.$head.'</a>';
    }
    
    function  isFriend($user, $current) {
      global $FriendManager;
      return $FriendManager->getFriendship($user, $current);
    }

//Sidebar
    function    isActive($link) {
        global $tabPanel;
        if ($tabPanel == $link)
            echo 'is-selected';
    }
    function    addCaret($link) {
        global $tabPanel;
        if ($tabPanel == $link)
            echo '<i class="fa fa-caret-right"></i>';
    }

if (isset($_POST['sync'])) {
    synchronize($_SESSION['currentUser']->getId());
    header('Location: '.$_SERVER['REDIRECT_URL']);
}

  function    addFriend($uid, $cid) {
    global $FriendManager;
    
    $data['userId'] = $uid;
    $data['friendId'] = $cid;
    $data['dateAdd'] = date("Y-m-d H:i");
    $f = new \Member\Friend($data);
    $FriendManager->add($f);
    header('Location: '.$_SERVER['REDIRECT_URL']);
  }

  function    removeFriend($uid, $cid) {
    global $FriendManager;
    
    $FriendManager->removeFriendship($uid, $cid);
    header('Location: '.$_SERVER['REDIRECT_URL']);
  }