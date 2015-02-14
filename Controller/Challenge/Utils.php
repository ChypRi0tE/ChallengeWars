<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 09/02/2015
 * Time: 23:29
 */
include_once("Controller/Challenge/Variables.php");

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idChallenge = $_GET['id'];
    } else {
        header('Location: /ChallengeWars');
    }
    if (!empty($_GET['tab'])) {
        if ($_GET['tab'] == 'entries')
            $tabPanel = 'Entries';
        else if ($_GET['tab'] == 'rankings')
            $tabPanel = 'Rankings';
        else
            $tabPanel = 'Comments';
    } else {
        $tabPanel = 'Comments';
    }

    //Sidebar
    function isActive($link) {
        global $tabPanel;
        if ($tabPanel == $link)
            echo 'is-selected';
    }
    function    addCaret($link) {
        global $tabPanel;
        if ($tabPanel == $link)
            echo '<i class="fa fa-caret-right"></i>';
    }