<?php
    include_once("../Controller/GlobalVariables.php");
    include_once("../Controller/Website.php");


  //requete Post, à utiliser pour INSERT, DELETE, UPDATE etc
  if (isset($_POST['type']) && $_POST['type'] == 'getChallenges') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_CHALLENGES_ . " WHERE status = " . $_POST['status'] . " AND isAdvanced = " . $_POST['isAdvanced'];
    $q = $bdd->query($query);
    $data = [];
    while ($tmp = $q->fetch()) {
      $tmp['champion'] = getChampionClean($tmp['champion']);
      $data[] = $tmp;
    }
    if (!empty($data)) {
        echo json_encode($data);
    }
    else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }
?>