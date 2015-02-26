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
        $q = $this->_bdd->prepare("INSERT INTO " . $this->_table . "
                     (idUser, dateInscription, challEntered, challWon, challCreated, commentPosted)
                    VALUES (:idUser,
                    :dateInscription,
                    :challEntered,
                    :challWon,
                    :challCreated,
                    :commentPosted)
                  ");
        $q->bindValue(':idUser', $stats->getIdUser());
        $q->bindValue(':dateInscription', $stats->getDateInscription());
        $q->bindValue(':challEntered', $stats->getChallEntered());
        $q->bindValue(':challWon', $stats->getChallWon());
        $q->bindValue(':challCreated', $stats->getChallCreated());
        $q->bindValue(':commentPosted', $stats->getCommentPosted());
        $q->execute();
    }
    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Member\Stats($data);
    }
    public function     update($stats) {
        if (!($stats instanceof \Member\Stats)) {new \Error\TypeError("Manager/Stats", "Stats", $stats->type);}
        $q = $this->_bdd->prepare("UPDATE " . $this->_table . "
                    SET idUser = :idUser,
                    dateInscription = :dateInscription,
                    challEntered = :challEntered,
                    challWon = :challWon,
                    challCreated = :challCreated,
                    commentPosted = :commentPosted
                    WHERE
                    id = :id
                  ");

        $q->bindValue(':idUser', $stats->getIdUser());
        $q->bindValue(':dateInscription', $stats->getDateInscription());
        $q->bindValue(':challEntered', $stats->getChallEntered());
        $q->bindValue(':challWon', $stats->getChallWon());
        $q->bindValue(':challCreated', $stats->getChallCreated());
        $q->bindValue(':commentPosted', $stats->getCommentPosted());
        $q->execute();
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function     getUserStats($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idUser = '.$id);
        $data = $q->fetch();
        return new \Member\Stats($data);
    }
} 