<?php 
include_once("../Controller/GlobalVariables.php");
include_once("../Controller/Website.php");
 
  if (isset($_POST['type']) && $_POST['type'] == 'champion') {
      $bdd = connectDatabase();
      $q = $bdd->query("SELECT id, cleanName FROM " . $_TABLE_CHAMPIONS_);
      $tab = [];
      while ($row = $q->fetch()) {
          $test = [];
          $test['id'] = $row['id'];
          $test['cleanName'] = $row['cleanName'];
          $tab[] = $test;
      }
      echo json_encode($tab);
  }