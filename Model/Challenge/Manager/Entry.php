<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 03:13
 */

namespace Challenge\Manager;


class Entry implements \Manager {
    private $_bdd;
    private $_table;

    public function     __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }
    public function     add($entry) {
        if (!($entry instanceof \Challenge\Entry)) {new \Error\TypeError("Manager/Entry", "Entry", $entry->type);}
        $q = $this->_bdd->prepare("INSERT INTO " . $this->_table . "
                    (idChallenge, idUser, dateEntry, points)
                    VALUES (:idChallenge,
                    :idUser,
                    :dateEntry,
                    :points)
                  ");
        $q->bindValue(':idChallenge', $entry->getIdChallenge());
        $q->bindValue(':idUser', $entry->getIdUser());
        $q->bindValue(':dateEntry', $entry->getDateEntry());
        $q->bindValue(':points', $entry->getPoints());
        $q->execute();
    }
    public function     update($entry) {
        if (!($entry instanceof \Challenge\Entry)) {throw new TypeError("Manager/Entry", "Entry", $entry->type);}
        $q = $this->_bdd->query('UPDATE ' . $this->_table . '
                    SET idChallenge = '.$entry->getIdChallenge().',
                    idUser = '.$entry->getIdUser().',
                    dateEntry = "'.$entry->getDateEntry().'",
                    points = '.$entry->getPoints().'
                    WHERE id = '.$entry->getId().'
                  ');
    }
    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Challenge\Entry($data);
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }


    public function     getForChallenge($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idChallenge = '.$id.' ORDER BY dateEntry ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Entry($data);
        }
        return $list;
    }
    public function     getForUser($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idUser = '.$id.' ORDER BY dateEntry DESC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Entry($data);
        }
        return $list;
    }
    public  function    getAll() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table);
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Entry($data);
        }
        return $list;
    }

    public function     getNbForChallenge($id) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE idChallenge = '.$id);
        return $q->fetch()[0];
    }
    public function     getNbForUser($id) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE idUser = '.$id);
        return $q->fetch()[0];
    }
    public function getUserChallenge($idChall, $idUser) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE idUser = '.$idUser.' AND idChallenge = '.$idChall);
        return $q->fetch()[0];
    }
    public function findUserChallenge($idChall, $idUser) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idUser = '.$idUser.' AND idChallenge = '.$idChall);
        return new \Challenge\Entry($q->fetch());
    }
    public function     getRankingForChallenge($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idChallenge = '.$id.' ORDER BY points DESC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Entry($data);
        }
        return $list;
    }
} 