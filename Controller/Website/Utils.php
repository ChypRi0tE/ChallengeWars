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
    include_once("Controller/Website/LoadClasses.php");
    session_start();

    function    isLogged() {
        return isset($_SESSION['currentUser']) && ($_SESSION['currentUser'] != null);
    }
    function    connectDatabase() {
        global $_BDD_SERVER_, $_BDD_USER_, $_BDD_PASS_, $_BDD_NAME_;

        try {
            $bdd = new PDO('mysql:host='.$_BDD_SERVER_.';dbname='.$_BDD_NAME_, $_BDD_USER_, $_BDD_PASS_);
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

    function    getRelativeDate($date) {
        $dateToday = new DateTime();
        $dateCheck = new DateTime($date);
        $dateDiff = $dateCheck->diff($dateToday);

        if ($dateDiff->d == 0) {
            echo "Today";
        } else if ($dateDiff-> d == 1) {
            echo "Tomorrow";
        } else {
            echo $dateDiff->d . " " . $dateCheck->format("PM");
        }
    }
    function    getTimeFromNow($date) {
        $dateEnd = new DateTime($date);
        $dateToday = new DateTime();
        $dateDiff = $dateEnd->diff($dateToday);

        $r['day'] = $dateDiff->d;
        $r['hour'] = $dateDiff->h;
        $r['min'] = $dateDiff->i;

        if ($r['day'] > 0) {
            if ($r['hour'] == 0)
                echo "Ending in " . $r['min'] . " minutes";
            else
                echo "Ending in " . $r['hour'] . " hours";
        } else {
            echo $dateDiff->format('%d %m %y - %h:%i');
        }
    }

    function    getChallengeType($type, $bool) {
        switch ($type) {
            case 1:
                $str = $bool ? '<i class="fa fa-crosshairs"></i> ':'';
                return  $str .= 'Creep';
            case 2:
                $str = $bool ? '<i class="fa fa-flag-checkered"></i> ':'';
                return  $str .= 'Victory';
            case 3:
                $str = $bool ? '<i class="fa fa-clock-o"></i> ':'';
                return  $str .= 'Time';
            case 4:
                $str = $bool ? '<i class="fa fa-cog"></i> ':'';
                return  $str .= 'Custom';
        }
        return null;
    }
