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
    header('Location: '.$_LINK_USER_."/".$_SESSION['currentUser']->getUsername());
}

    function    getChampionPic($id) {
        global $bdd;
        $q = $bdd->query("SELECT * FROM cw_lol_champions WHERE id = ". $id);
        if ($data = $q->fetch())
            return "http://ddragon.leagueoflegends.com/cdn/5.1.2/img/champion/".$data['cleanName'].".png";
        return null;
    }