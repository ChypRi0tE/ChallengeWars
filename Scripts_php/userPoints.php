<?php
    include_once("../Controller/GlobalVariables.php");
    include_once("../Controller/Website.php");

   if (isset($_POST['type']) && $_POST['type'] == 'updatePoints') {
    $bdd = connectDatabase();
    $query = "UPDATE " . $_TABLE_USERS_ . " SET points=" . $_POST['points'] . " WHERE id = " . $_POST['id'];
    $q = $bdd->query($query);
    if ($data = $q->fetch()) {
        echo json_encode($data);
    } else {
        echo "{\"error\":\"query return was empty\"}";
    }
}