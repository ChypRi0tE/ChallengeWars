<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 25/02/2015
 * Time: 19:41
 */
$bdd = connectDatabase();
$UserManager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
$StatManager = new \Member\Manager\Stats($bdd, $_TABLE_USERS_STATS_);

$listUsers = $UserManager->getAll();