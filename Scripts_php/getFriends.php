<?php
include_once("../Controller/GlobalVariables.php");
include_once("../Controller/Website.php");

if (isset($_POST['type']) && $_POST['type'] == 'friends') {
    $bdd = connectDatabase();
    $query = "SELECT friendId FROM " . $_TABLE_USERS_FRIENDS_ . " WHERE userId = " . $_POST['id'];
    $q = $bdd->query($query);
    $tab = [];
    for ($i=0; $row = $q->fetch();$i++) {
        $tab[$i] = $row["friendId"];
    }
    $query = "SELECT id, username, avatar FROM " . $_TABLE_USERS_ . " WHERE id IN (" . implode(',', $tab) . ")";
    $q = $bdd->query($query);
    $tab = [];
    for ($i=0; $row = $q->fetch();$i++) {
        $tab[$i] = $row;
    }
    echo(json_encode($tab));
}