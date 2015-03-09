<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 22:57
 */

namespace Member\Manager;


class Stats implements \Manager {
    private $_bdd;
    private $_table;

    function __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }

    public function     add($stats) {
        if (!($stats instanceof \Member\Stats)) {new \Error\TypeError("Manager/Stats", "Stats", $stats->type);}
        $q = $this->_bdd->query("INSERT INTO " . $this->_table . "
                     (idUser, dateInscription, challEntered, challWon, challCreated, commentPosted, nbFriends)
                    VALUES (".$stats->getIdUser().",
                    '".$stats->getDateInscription()."',
                    ".$stats->getChallEntered().",
                    ".$stats->getChallWon().",
                    ".$stats->getChallCreated().",
                    ".$stats->getCommentPosted().",
                    ".$stats->getNbFriends().")
                  ");
    }
    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Member\Stats($data);
    }
    public function     update($stats) {
        if (!($stats instanceof \Member\Stats)) {new \Error\TypeError("Manager/Stats", "Stats", $stats->type);}
        $q = $this->_bdd->exec("UPDATE " . $this->_table . "
                    SET idUser = ".$stats->getIdUser().",
                     dateInscription = '".$stats->getDateInscription()."',
                     challEntered = ".$stats->getChallEntered().",
                     challWon = ".$stats->getChallWon().",
                     challCreated = ".$stats->getChallCreated().",
                     commentPosted = ".$stats->getCommentPosted().",
                     nbFriends = ".$stats->getNbFriends()."
                     WHERE id = ".$stats->getId()."
                 ");
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function     getUserStats($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idUser = '.$id);

        if ($data = $q->fetch())
            return new \Member\Stats($data);
        return null;
    }
} 