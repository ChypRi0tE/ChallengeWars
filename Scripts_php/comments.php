<?php
include_once("../Controller/GlobalVariables.php");
include_once("../Controller/Website.php");
include_once("../Controller/Website/Utiles.php");

if (isset($_POST['type']) && $_POST['type'] == 'add') {
    $bdd = connectDatabase();
    $query = "INSERT INTO " . $_TABLE_COMMENTS_ . " (idChallenge, idUser, datePost, content)
        VALUES ('" . $_POST['idChallenge'] . "',
                '" . $_POST['idUser'] . "',
                '" . date("Y-m-d H:i:s", strtotime("+6 hours")) . "',
                '" . $_POST['content'] . "'
        )";
    $bdd->query($query);
}

  if (isset($_POST['type']) && $_POST['type'] == 'get') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_COMMENTS_ . " WHERE idChallenge = " . $_POST['idChallenge'] . " ORDER BY datePost ASC";
    $q = $bdd->query($query);
    $tmp = [];
    while ($data = $q->fetch()) {
        $tmp[] = $data;
    } 
    if (!empty($tmp)) {
        echo json_encode($tmp);        
    }
    else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }

?>