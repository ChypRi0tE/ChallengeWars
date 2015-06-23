<?php
include_once("../Controller/GlobalVariables.php");
include_once("../Controller/Website.php");
include_once("../Controller/Website/Utiles.php");

  if (isset($_POST['type']) && $_POST['type'] == 'get') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_ENTRIES_ . " WHERE idChallenge = " . $_POST['idChallenge'] . " ORDER BY points DESC";
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