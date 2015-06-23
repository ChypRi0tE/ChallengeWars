<?php
include_once("../Controller/Website/Utils.php");
include_once("../Controller/GlobalVariables.php");
include_once("../Controller/Website.php");


if (isset($_POST['type']) && $_POST['type'] == 'challenge') {
    $bdd = connectDatabase();
    $query = "INSERT INTO " . $_TABLE_CHALLENGES_ . " (title, dateCreation, dateEnd, idCreator, idPrize, description, isAdvanced, status, cost, type, champion)
        VALUES ('" . $_POST['title'] . "',
                '" . date("Y-m-d H:i:s", strtotime("+6 hours")) . "',
                '" . date("Y-m-d H:i:s", strtotime("+7 days")) . "',
                '" . $_POST['idCreator'] . "',
                '" . $_POST['idPrize'] . "',
                '" . $_POST['description'] . "',
                '" . $_POST['isAdvanced'] . "',
                '" . $_POST['status'] . "',
                '" . $_POST['cost'] . "',
                '" . $_POST['type2'] . "',
                '" . $_POST['champion'] . "'
        )";
    $q = $bdd->query($query);
    echo($query);
}
?>