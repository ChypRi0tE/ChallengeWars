<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 09/02/2015
 * Time: 23:29
 */
include_once("Controller/Challenge/Variables.php");

  //Récupération de l'id du challenge et du tab en cours
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idChallenge = $_GET['id'];
    } else {
        header('Location: '.$_SITE_INDEX_);
    }
    
    if (!empty($_GET['tab'])) {
        if (strtolower($_GET['tab']) == $_LINK_ENTRIES_)
            $tabPanel = 'Entries';
        else if (strtolower($_GET['tab']) == $_LINK_RANKING_)
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
    
    function isUserRegistered() {
      global $idChallenge, $EntryManager;
      
      if(($user = $_SESSION['currentUser']) == null) {return false;}
      return $EntryManager->getUserChallenge($idChallenge, $user->getId());
    }
    
