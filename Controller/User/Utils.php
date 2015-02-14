<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 11:00
 */
include_once("Controller/User/Variables.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idUser = $_GET['id'];
} else {
    header('Location: /ChallengeWars');
}
if (!empty($_GET['tab'])) {
    if ($_GET['tab'] == 'won')
        $tabPanel = 'Won';
    else if ($_GET['tab'] == 'entries')
        $tabPanel = 'Entries';
    else if ($_GET['tab'] == 'comments')
        $tabPanel = 'Comments';
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
        }
    }
    function    getPageHeading($tab) {
        global $thisStats;
        $head = "";
        switch ($tab) {
            case "Created":
                $head = "Created";
                break;
            case "Won":
                $head = "Won";
                break;
            case "Entries":
                $head = "Entered";
                break;
            case "Comments":
                $head = "Comments";
                break;
        }
        return '<a href="user.php?'.$_SERVER['QUERY_STRING'].'">'.$head.'</a>';
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