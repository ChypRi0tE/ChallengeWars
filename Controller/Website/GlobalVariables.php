<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:35
 */
    if (false) {
        $_BDD_SERVER_ = "localhost";
        $_BDD_NAME_ = "challengewars";
        $_BDD_USER_ = "root";
        $_BDD_PASS_ = "toor";
        $_SITE_INDEX_ = "/ChallengeWars/";
    } else if (false) {
        $_BDD_SERVER_ = "sql203.5gb.co";
        $_BDD_NAME_ = "5gbc_15477651_lolc";
        $_BDD_USER_ = "5gbc_15477651";
        $_BDD_PASS_ = "U8r5bhEe95";
    } else if (true) {
        $_BDD_SERVER_ = "sql307.byethost12.com";
        $_BDD_NAME_ = "b12_15918047_challengewars";
        $_BDD_USER_ = "b12_15918047";
        $_BDD_PASS_ = "ettasoeur42";
        $_SITE_INDEX_ = "/";
    }
    $_ALLOW_FRIENDS_ = false;
    $_DEBUG_ = false;


    $_TABLE_CHALLENGES_ = "cw_challenges";
    $_TABLE_COMMENTS_   = "cw_challenges_comments";
    $_TABLE_ENTRIES_   = "cw_challenges_entries";
    $_TABLE_USERS_      = "cw_users";
    $_TABLE_USERS_STATS_ = "cw_users_stats";
    $_TABLE_SUMMONERS_ = "cw_summoners";
    $_TABLE_SUMMONERS_HISTORY_ = "cw_summoners_history";
    

    
    $_LINK_CHALLENGE_ = $_SITE_INDEX_ . "challenge";
    $_LINK_NEW_ = $_LINK_CHALLENGE_ . "/new";
    $_LINK_ENTRIES_ =  "entries";
    $_LINK_RANKING_ = "rankings";
    $_LINK_COMMENT_ = "comments";
    $_LINK_HISTORY_ = "history";
    
    $_LINK_USER_ =  $_SITE_INDEX_ . "user";
    $_LINK_CREATED_ =  "created";
    $_LINK_ENTERED_ =  "entered";
    $_LINK_WON_ =  "won";
    $_LINK_UCOMMENT_ = "comments";
    
    $_LINK_ABOUT_ = $_SITE_INDEX_ . "about";
    $_LINK_FAQ_ = "faq";
    $_LINK_USERS_ = "users";
    $_LINK_ROLES_ = "roles";
    $_LINK_TERMS_ = "terms";
    
    $_LINK_LOGIN_ = $_SITE_INDEX_ . "login";
    $_LINK_LOGOUT_ = $_SITE_INDEX_ . "logout";

    $_LINK_ACCOUNT_ = $_SITE_INDEX_ . "account";
    $_LINK_SYNC_ = "sync";
    $_LINK_INBOX_ = "inbox";
    
    //setlocale(LC_TIME, "fr_FR");