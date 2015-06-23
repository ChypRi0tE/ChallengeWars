<?php
    include_once("../Controller/GlobalVariables.php");
    include_once("../Controller/Website.php");


  //requete Post, à utiliser pour INSERT, DELETE, UPDATE etc
  if (isset($_POST['type']) && $_POST['type'] == 'getMatch') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_SUMMONERS_HISTORY_ . " WHERE userId = " . $_POST['id'];
    $q = $bdd->query($query);
    $data = [];
    while ($match = $q->fetch()) {
      $match['championId'] = getChampionClean($match['championId']);
      $match['ally1'] = getChampionClean($match['ally1']);
      $match['ally2'] = getChampionClean($match['ally2']);
      $match['ally3'] = getChampionClean($match['ally3']);
      $match['ally4'] = getChampionClean($match['ally4']);
      $match['enemy1'] = getChampionClean($match['enemy1']);
      $match['enemy2'] = getChampionClean($match['enemy2']);
      $match['enemy3'] = getChampionClean($match['enemy3']);
      $match['enemy4'] = getChampionClean($match['enemy4']);
      $match['enemy5'] = getChampionClean($match['enemy5']);
      $data[] = $match;
    }
    if (!empty($data)) {
      echo json_encode($data);
    } else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }
?>