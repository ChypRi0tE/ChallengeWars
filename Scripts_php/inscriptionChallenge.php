<?php
include_once("../Controller/GlobalVariables.php");
include_once("../Controller/Website.php");
include_once("../Controller/Website/Utiles.php");

if (isset($_POST['type']) && $_POST['type'] == 'inscriptionChallenge') {
    $bdd = connectDatabase();
    $query = "INSERT INTO " . $_TABLE_ENTRIES_ . " (idChallenge, idUser, dateEntry, points)
        VALUES ('" . $_POST['idChallenge'] . "',
                '" . $_POST['idUser'] . "',
                '" . date("Y-m-d H:i:s", strtotime("+6 hours")) . "',
                '" . $_POST['points'] . "'
        )";
    $bdd->query($query);
}

if (isset($_POST['type']) && $_POST['type'] == 'desinscriptionChallenge') {
    $bdd = connectDatabase();
    $query = "DELETE FROM " . $_TABLE_ENTRIES_ . " WHERE idChallenge = '" . $_POST['idChallenge'] . "' AND idUser = '" . $_POST['idUser'] . "'";
    $bdd->query($query);
    echo("test");;
}

  if (isset($_POST['type']) && $_POST['type'] == 'ifRegister') {
    $bdd = connectDatabase();
    $query = "SELECT * FROM " . $_TABLE_ENTRIES_ . " WHERE idChallenge = '" . $_POST['idChallenge'] . "' AND idUser = '" . $_POST['idUser'] . "'";
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
      echo json_encode($data);
    } else {
      echo "{\"error\":\"query return was empty\"}";
    }
  }
?>