<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 04/03/2015
 * Time: 17:52
 */

namespace Summoner\Manager;


class Match implements \Manager {
    private $_bdd;
    private $_table;

    function __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }

    public function    add($game) {
        if (!($game instanceof \Summoner\Match)) {new \Error\TypeError("Manager/Match", "Match", $game->type);}
        $this->_bdd->query("INSERT INTO " . $this->_table . "
                    (userId, matchId, championId, matchDuration, matchCreation, matchType, kills, deaths, assists, creeps, victory, side,
                     ally1, ally2, ally3, ally4, enemy1, enemy2, enemy3, enemy4, enemy5)
                    VALUES (".$game->getUserId().",
                    ".$game->getMatchId().",
                    '".$game->getChampionId()."',
                    '".$game->getMatchDuration()."',
                    '".$game->getMatchCreation()."',
                    '".$game->getMatchType()."',
                    '".$game->getKills()."',
                    '".$game->getDeaths()."',
                    '".$game->getAssists()."',
                    '".$game->getCreeps()."',
                    '".$game->getVictory()."',
                    '".$game->getSide()."',
                    '".$game->getAlly1()."',
                    '".$game->getAlly2()."',
                    '".$game->getAlly3()."',
                    '".$game->getAlly4()."',
                    '".$game->getEnemy1()."',
                    '".$game->getEnemy2()."',
                    '".$game->getEnemy3()."',
                    '".$game->getEnemy4()."',
                    '".$game->getEnemy5()."')
                  ");
    }

    public function    get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        if ($data = $q->fetch())
            return new \Summoner\Match($data);
        return null;
    }

    public function    update($item) {
        // TODO: Implement update() method.
    }

    public function    remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function getFromUser($id) {
        $q = $this->_bdd->query('SELECT * FROM ' . $this->_table . ' WHERE userId = ' . $id);
        $list = [];
        while ($data = $q->fetch())
            $list[] = new \Summoner\Match($data);
        return $list;
    }

    public function getFromChampion($id) {
        $q = $this->_bdd->query('SELECT * FROM ' . $this->_table . ' WHERE championId = ' . $id);
        $list = [];
        while ($data = $q->fetch())
            $list[] = new \Summoner\Match($data);
        return $list;
    }

    public function getFromUserChampion($uid, $cid) {
        $q = $this->_bdd->query('SELECT * FROM ' . $this->_table . ' WHERE userId = '.$uid.' AND championId = ' . $cid);
        $list = [];
        while ($data = $q->fetch())
            $list[] = new \Summoner\Match($data);
        return $list;
    }
}