<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 19:02 - 81dc9bdb52d04dc20036dbd8313ed055
 */
    include_once("Controller/Login/Variables.php");

    function    checkRegistration($post, $_bdd) {
        if ($_POST['register-password'] != $_POST['register-password-check']) {
            return new \Error\Error("Password does not match.", "register", 2);
        }
        if (!filter_var($_POST['register-mail'], FILTER_VALIDATE_EMAIL)) {
            return new \Error\Error("Invalid email.", "register", 2);
        }
        if (strlen($_POST['register-password']) <= 5) {
            return new \Error\Error("Password is too short.", "register", 2);
        }
        $q = $_bdd->query('SELECT count(*) FROM cw_users WHERE username="'.$_POST['register-username'].'"');
        $data =  $q->fetch();
        if ($data[0] != 0) {
            return new \Error\Error("Username already used.", "register", 2);
        }
        $q = $_bdd->query('SELECT count(*) FROM cw_users WHERE mail="'.$_POST['register-mail'].'"');
        $data =  $q->fetch();
        if ($data[0] != 0) {
            return new \Error\Error("Email already used.", "register", 2);
        }
        return null;
    }

    if (isLogged()) {header('Location: /ChallengeWars'); }
    if (isset($_POST['do-login'])) {
        if (empty($_POST['login-username']) || empty ($_POST['login-password'])) {
            $_isLoginError = true;
            $_loginError = new \Error\Error("Username and Password cannot be empty", "login", 2);
        }
        $_bdd = connectDatabase();
        $username = htmlspecialchars($_POST['login-username']);
        $password = md5(htmlspecialchars($_POST['login-password']));
        $q = $_bdd->query('SELECT * FROM cw_users WHERE username="'.$username.'" AND password="'.$password.'"');
        if (!$q) {
            $_isLoginError = true;
            $_loginError = new \Error\Error("Wrong username and/or password", "login", 2);
        } else {
            $data = $q->fetch();
            $_SESSION['currentUser'] = new \Member\User($data);
            header('Location: '.$_SITE_INDEX_);
        }
    }

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

        if (($result = checkRegistration($_POST, $_bdd)) != null) {
            $_isRegisterError = true;
            $_registerError = $result;
            return;
        }
        $data = [];
        $data['username'] = $_POST['register-username'];
        $data['password'] = md5($_POST['register-password']);
        $data['mail'] = $_POST['register-mail'];
        $data['avatar'] = 'default.jpg';
        $data['points'] = 1;
        $data['rank'] = 0;
        $mgr = new Member\Manager\User($_bdd, $_TABLE_USERS_);
        $usr = new \Member\User($data);
        $mgr->add($usr);
        header('Location: '.$_SITE_INDEX_);
    }