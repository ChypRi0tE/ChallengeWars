<?php

//Récupération du tab courant
//Défaut : FAQ
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

/* ---------------------------
 * VARIABLES------------------
 * ---------------------------
 */
    $_PAGENAME_ = "About";
    $_PAGETITLE_ = "About";
    
    $_LIST_NB = 10;

/* ---------------------------
 * DATAS----------------------
 * ---------------------------
 */
    $bdd = connectDatabase();
    $UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
    $StatManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);
    
    $listUsers = $UserManager->getAll();


/* ---------------------------
 * FUNCTIONS------------------
 * ---------------------------
 */
