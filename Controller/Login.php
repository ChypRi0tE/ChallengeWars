<?php
if (isLogged()) {header('Location: '. $_SITE_INDEX_); }
/* ---------------------------
 * VARIABLES------------------
 * ---------------------------
 */
$_PAGENAME_ = "Login";
$_PAGETITLE_ = "Login";
$_PAGEHEAD_ = "ChypRiotE";

/* ---------------------------
 * DATAS----------------------
 * ---------------------------
 */

/* ---------------------------
 * FUNCTIONS------------------
 * ---------------------------
 */
//Vérification des infos entrées par l'utilisateur
//TODO refactorisation en utilisant un manager
function    checkRegistration($post, $_bdd) {
    global $_TABLE_USERS_;

    if ($post['register-password'] != $post['register-password-check']) {
        return new \Error\Error("Password does not match.", "register", 2);
    }
    if (!filter_var($post['register-mail'], FILTER_VALIDATE_EMAIL)) {
        return new \Error\Error("Invalid email.", "register", 2);
    }
    if (strlen($post['register-password']) <= 5) {
        return new \Error\Error("Password is too short.", "register", 2);
    }
    $q = $_bdd->query('SELECT count(*) FROM '.$_TABLE_USERS_.' WHERE username="'.$post['register-username'].'"');
    $data =  $q->fetch();
    if ($data[0] != 0) {
        return new \Error\Error("Username already used.", "register", 2);
    }
    $q = $_bdd->query('SELECT count(*) FROM '.$_TABLE_USERS_.' WHERE mail="'.$post['register-mail'].'"');
    $data =  $q->fetch();
    if ($data[0] != 0) {
        return new \Error\Error("Email already used.", "register", 2);
    }
    return null;
}

//Connection 
//TODO refactorisation en utilisant un manager   
if (isset($_POST['do-login'])) {
    if (empty($_POST['login-username']) || empty ($_POST['login-password'])) {
        $_isLoginError = true;
        $_loginError = new \Error\Error("Username and Password cannot be empty", "login", 2);
    }
    $_bdd = connectDatabase();
    $username = htmlspecialchars($_POST['login-username']);
    $password = md5(htmlspecialchars($_POST['login-password']));
    $q = $_bdd->query('SELECT * FROM '.$_TABLE_USERS_.' WHERE username="'.$username.'" AND password="'.$password.'"');
    $data = $q->fetch();
    if (!$data) {
        $_isLoginError = true;
        $_loginError = new \Error\Error("Wrong username and/or password", "login", 2);
    } else {
        $user = new \Member\User($data);
        $_SESSION['currentUser'] = $user;
        if ($user->getIsValidated()) {
            $q = $_bdd->query('SELECT * FROM cw_summoners WHERE userId = ' . $user->getId());
            $_SESSION['currentSummoner'] = new \Summoner\Summoner($q->fetch());
        }
        header('Location: '. $_SITE_INDEX_);
    }
}

//Enregistrement 
//TODO refactorisation en utilisant un manager   
if (isset($_POST['do-register'])) {
    if (empty($_POST['register-username']) || empty ($_POST['register-password']) || empty ($_POST['register-mail']) || empty ($_POST['register-password-check'])) {
        $_isRegisterError = true;
        $_registerError = new \Error\Error("You must fill every field.", "login", 2);
        return;
    }
    $_bdd = connectDatabase();
    $_POST['register-username'] = htmlspecialchars($_POST['register-username']);
    $_POST['register-password'] = htmlspecialchars($_POST['register-password']);
    $_POST['register-mail'] = htmlspecialchars($_POST['register-mail']);
    $_POST['register-password-check'] = htmlspecialchars($_POST['register-password-check']);
/*
    if (($result = checkRegistration($_POST, $_bdd)) != null) {
        $_isRegisterError = true;
        $_registerError = $result;
        return;
    }*/
    $data = [];
    $data['username'] = $_POST['register-username'];
    $data['password'] = md5($_POST['register-password']);
    $data['mail'] = $_POST['register-mail'];
    $data['avatar'] = '0';
    $data['isAdvanced'] = 0;
    $data['isValidated'] = 0;
    $data['rank'] = 0;
    $data['points'] = 20;
    $mgr = new Member\Manager\User($_bdd, $_TABLE_USERS_);
    $usr = new \Member\User($data);
    $mgr->add($usr);
    $usr = $mgr->getFromName($usr->getUsername());
    $dataStats['idUser'] = $usr->getId();
    $dataStats['dateInscription'] = date("Y-m-d H:i:s");
    $dataStats['challEntered'] = 0;
    $dataStats['challWon'] = 0;
    $dataStats['challCreated'] = 0;
    $dataStats['commentPosted'] = 0;
    $dataStats['nbFriends'] = 0;
    $statmgr = new Member\Manager\Stats($_bdd, $_TABLE_USERS_STATS_);
    $stats = new \Member\Stats($dataStats);
    $statmgr->add($stats);
    header('Location: '.$_SITE_INDEX_);
}
