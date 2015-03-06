<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 21:44
 */
 
    include_once("Controller/GlobalVariables.php");
    session_start();
    session_destroy();
    header('Location: '.$_SITE_INDEX_);