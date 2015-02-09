<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 07/02/2015
 * Time: 18:50
 */

    include_once("Controller/Website/GlobalVariables.php");

    function    load($class) {
        require_once 'Model/' . $class . '.php';
    }
    spl_autoload_register('load');
    session_start();

    function    isLogged() {
        return isset($_SESSION['currentUser']) && ($_SESSION['currentUser'] != null);
    }
    function    connectDatabase() {
        global $_BDD_SERVER_, $_BDD_USER_, $_BDD_PASS_, $_BDD_NAME;

        try {
            $bdd = new PDO('mysql:host='.$_BDD_SERVER_.';dbname='.$_BDD_NAME, $_BDD_USER_, $_BDD_PASS_);
        } catch (Exception $e) {
            die('<strong>Error :</strong> ' . $e->getMessage());
        }
        return $bdd;
    }
    function    isSelected($link) {
        global $_PAGENAME_;
        if (strtolower($_PAGENAME_) == strtolower($link))
            echo "is-selected";
    }
?>