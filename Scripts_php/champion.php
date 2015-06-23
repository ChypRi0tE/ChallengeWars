<?php
    include_once("../Controller/GlobalVariables.php");

  if (isset($_GET['id'])) {
    $bdd = new PDO('mysql:host='.$_BDD_SERVER_.';dbname='.$_BDD_NAME_, $_BDD_USER_, $_BDD_PASS_);
    $q = $bdd->query("SELECT * FROM cw_lol_champions WHERE id = ". $_GET['id']);
    if ($data = $q->fetch())
      echo "http://ddragon.leagueoflegends.com/cdn/5.3.1/img/champion/".$data['cleanName'].".png";
    echo null;
  } else if (isset($_POST['id'])) {
    $bdd = new PDO('mysql:host='.$_BDD_SERVER_.';dbname='.$_BDD_NAME_, $_BDD_USER_, $_BDD_PASS_);
    $q = $bdd->query("SELECT * FROM cw_lol_champions WHERE id = ". $_POST['id']);
    if ($data = $q->fetch())
      echo "http://ddragon.leagueoflegends.com/cdn/5.3.1/img/champion/".$data['cleanName'].".png";
    echo null;
  }
?>