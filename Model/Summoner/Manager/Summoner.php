<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 01/03/2015
 * Time: 19:36
 */

namespace Summoner\Manager;


class Summoner implements \Manager {
    private $_bdd;
    private $_table;

    function __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }
    public function    add($sum) {
        if (!($sum instanceof \Summoner\Summoner)) {new \Error\TypeError("Manager/Summoner", "Summoner", $sum->type);}
        $q = $this->_bdd->query("INSERT INTO " . $this->_table . "
                     (userId, summonerId, summonerName, nbGames, dateValidation, lastSync)
                    VALUES (".$sum->getUserId().",
                    ".$sum->getSummonerId().",
                    '".$sum->getSummonerName()."',
                    '".$sum->getNbGames()."',
                    '".$sum->getDateValidation()."',
                    '".$sum->getLastSync()."')
                  ");
    }

    public function    get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        if ($data = $q->fetch())
            return new \Summoner\Summoner($data);
        return null;
    }

    public function    update($sum) {
        if (!($sum instanceof \Summoner\Summoner)) {new \Error\TypeError("Manager/Summoner", "Summoner", $sum->type);}
        $q = $this->_bdd->prepare("UPDATE " . $this->_table . "
                    SET userId = :userId,
                    summonerId = :summonerId,
                    summonerName = :summonerName,
                    nbGames = :nbGames,
                    dateValidation = :dateValidation,
                    lastSync = :lastSync
                    WHERE id = :id
                  ");

        $q->bindValue(':userId', $sum->getUserId());
        $q->bindValue(':summonerId', $sum->getSummonerId());
        $q->bindValue(':summonerName', $sum->getSummonerName());
        $q->bindValue(':nbGames', $sum->getNbGames());
        $q->bindValue(':dateValidation', $sum->getDateValidation());
        $q->bindValue(':lastSync', $sum->getLastSync());
        $q->bindValue(':id', $sum->getId());
        $q->execute();
    }

    public function    remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function getFromId($id) {
        $q = $this->_bdd->query('SELECT * FROM ' . $this->_table . ' WHERE userId = ' . $id);
        if ($data = $q->fetch())
            return new \Summoner\Summoner($data);
        return null;
    }

    public function getNbGames($id) {
        $q = $this->_bdd->query('SELECT count(*) FROM ' . $this->_table . ' WHERE userId = ' . $id);
        return $q->fetch()[0];
    }
}