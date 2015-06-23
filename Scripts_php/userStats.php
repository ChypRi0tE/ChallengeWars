<?php
    include_once("../Controller/GlobalVariables.php");
    include_once("../Controller/Website.php");


  //requete Post, à utiliser pour INSERT, DELETE, UPDATE etc
  if (isset($_POST['type']) && $_POST['type'] == 'getUserStats') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_USERS_STATS_ . " WHERE idUser = " . $_POST['id'];
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
      echo json_encode($data);
    } else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }
?>