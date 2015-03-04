<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 14/02/2015
 * Time: 13:11
 */
include_once("Controller/New/Variables.php");

 if (isset($_POST['do-new'])) {
        if (empty($_POST['type']) || empty ($_POST['description'])) {
			  return;
        }
		
        $_bdd = connectDatabase();
        $_POST['type'] = htmlspecialchars($_POST['type']);
        $_POST['description'] = htmlspecialchars($_POST['description']);

        $data = [];
        $data['Type'] = $_POST['type'];
        $data['Description'] = $_POST['description'];
  

        $q = $bdd->prepare("INSERT INTO " . $_TABLE_CHALLENGES . "
                    ('type', 'description')
                    VALUES (:type,
                    :description)
                  ");

       /* $q->bindValue(':type', $_POST['type']);
        //$q->bindValue(':description', $_POST['description']);		
        */
		//$q->execute();

    }