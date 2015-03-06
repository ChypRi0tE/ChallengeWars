<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 02/03/2015
 * Time: 15:39
 */
    include_once("Controller/Account/Variables.php");


if (!isLogged()) {header('Location: '. $_SITE_INDEX_); }
    if (!empty($_GET['tab'])) {
        if (strtolower($_GET['tab']) == $_LINK_INBOX_)
            $tabPanel = 'Inbox';
        else
            $tabPanel = 'Synchronisation';
    } else {
        $tabPanel = 'Synchronisation';
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
