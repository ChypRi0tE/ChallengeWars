<?php
    include_once("../Controller/GlobalVariables.php");
    include_once("../Controller/Website.php");


  //requete Post, à utiliser pour INSERT, DELETE, UPDATE etc
  if (isset($_POST['type']) && $_POST['type'] == 'get') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_USERS_ . " WHERE id = " . $_POST['id'];
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
      echo json_encode($data);
    } else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }
  if (isset($_POST['type']) && $_POST['type'] == 'getUsername') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_USERS_ . " WHERE id = '" . $_POST['id'] . "'";
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
        echo json_encode($data);
    } else {
        echo "{\"error\":\"query return was empty\"}";
    }      
  }

  if (isset($_POST['type']) && $_POST['type'] == 'goCo') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_USERS_ . " WHERE username = '" . $_POST['username'] . "'";
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
        echo json_encode($data);
    } else {
        echo "{\"error\":\"query return was empty\"}";
    }      
  }


  if (isset($_POST['type']) && $_POST['type'] == 'getU') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_USERS_ . " WHERE username = '" . $_POST['username'] . "'";
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
        echo json_encode($data);
    } else {
        echo "{\"error\":\"query return was empty\"}";
    }      
  }

if (isset($_POST['type']) && $_POST['type'] == 'putUser') {
    $bdd = connectDatabase();
    $query = "INSERT INTO " . $_TABLE_USERS_ . " (username, mail, password, avatar, isAdvanced, isValidated, rank)
        VALUES ('" . $_POST['username'] . "',
                '" . $_POST['mail'] . "',
                '" . $_POST['password'] . "',
                '" . $_POST['avatar'] . "',
                '" . $_POST['isAdvanced'] . "',
                '" . $_POST['isValidated'] . "',
                '" . $_POST['rank'] . "'
        )";
    $q = $bdd->query($query);
    $data = $q->fetch();
    //Ajout des stats 
    $uid = $bdd->lastInsertId();
    $q = $bdd->query("INSERT INTO " . $_TABLE_USERS_STATS_ . "
                     (idUser, dateInscription, challEntered, challWon, challCreated, commentPosted)
                    VALUES (".$uid.", '".date("Y-m-d H:i:s")."', 0, 0, 0, 0)");
    echo $q ? json_encode($data) : "{\"error\":\"query return was empty\"}";
}
  
  //requete GET pour les SELECT
  if (isset($_GET['type']) && $_GET['type'] == 'getId') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_USERS_ . " WHERE id = " . $_GET['id'];
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
      echo json_encode($data);
    } else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }
  if (isset($_GET['type']) && $_GET['type'] == 'getName') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_USERS_ . " WHERE username = '" . $_GET['name'] . "'";
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
      echo json_encode($data);
    } else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }
?>