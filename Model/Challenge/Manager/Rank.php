<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 05/03/2015
 * Time: 23:08
 */

namespace Challenge\Manager;


class Rank implements \Manager {
    private $_bdd;
    private $_table;

    public function     __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }
    public function     add($rank) {
        if (!($rank instanceof \Challenge\Rank)) {new \Error\TypeError("Manager/Rank", "Comment", $rank->type);}
        $q = $this->_bdd->query("INSERT INTO " . $this->_table . " (userId, challengeId, points, lastUpdate)
            VALUES (".$rank->getUserId().",
                    ".$rank->getChallengeId().",
                    '".$rank->getPoints()."',
                    '".$rank->getLastUpdate()."')
                    ");
    }
    public function     update($rank) {
        if (!($rank instanceof \Challenge\Rank)) {throw new TypeError("Manager/Rank", "Comment", $rank->type);}
        $q = $this->_bdd->prepare('UPDATE ' . $this->_table . '
                    SET userId = :userId,
                    challengeId = :challengeId,
                    points = :points,
                    lastUpdate = :lastUpdate
                    WHERE id = :id
                  ');

        $q->bindValue(':userId', $rank->getUserId(), PDO::PARAM_INT);
        $q->bindValue(':challengeId', $rank->getChallengeId(), PDO::PARAM_INT);
        $q->bindValue(':points', $rank->getPoints(), PDO::PARAM_INT);
        $q->bindValue(':lastUpdate', $rank->getPoints());
        $q->bindValue(':id', $rank->getLastUpdate(), PDO::PARAM_INT);

        $q->execute();
    }
    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Challenge\Rank($data);
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function     getForChallenge($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE challengeId = '.$id.' ORDER BY points DESC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Rank($data);
        }
        return $list;
    }

    public function     getNbForChallenge($id) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE challengeId = '.$id);
        return $q->fetch()[0];
    }
} 