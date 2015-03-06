<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 14/02/2015
 * Time: 13:11
 */
include_once("Controller/New/Variables.php");
if (!isLogged())
		header('Location: '.$_SITE_INDEX_);