<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 25/02/2015
 * Time: 19:37
 */
    include_once("Controller/About/Variables.php");

    //Récupération de l'id du challenge et du tab en cours
    if (!empty($_GET['tab'])) {
        if (strtolower($_GET['tab']) == $_LINK_TERMS_)
            $tabPanel = 'Terms';
        else if (strtolower($_GET['tab']) == $_LINK_USERS_)
            $tabPanel = 'Users';
        else
            $tabPanel = 'FAQ';
    } else {
        $tabPanel = 'FAQ';
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