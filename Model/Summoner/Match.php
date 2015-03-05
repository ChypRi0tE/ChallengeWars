<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 04/03/2015
 * Time: 17:48
 */

namespace Summoner;


class Match {
    protected   $_id;
    protected   $_userId;
    protected   $_matchId;
    protected   $_championId;
    protected   $_matchDuration;
    protected   $_matchCreation;
    protected   $_matchType;
    protected   $_kills;
    protected   $_deaths;
    protected   $_assists;
    protected   $_creeps;
    protected   $_victory;
    protected   $_side;
    protected   $_ally1;
    protected   $_ally2;
    protected   $_ally3;
    protected   $_ally4;
    protected   $_enemy1;
    protected   $_enemy2;
    protected   $_enemy3;
    protected   $_enemy4;
    protected   $_enemy5;

    public function __construct(array $data) {
        $this->create($data);
    }
    private function create(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /* ---------------------------
     * GETTERS-SETTERS------------
     * ---------------------------
     */
    public function getAlly1() {
        return $this->_ally1;
    }
    public function setAlly1($ally1) {
        $this->_ally1 = $ally1;
    }
    public function getAlly2() {
        return $this->_ally2;
    }
    public function setAlly2($ally2) {
        $this->_ally2 = $ally2;
    }
    public function getAlly3() {
        return $this->_ally3;
    }
    public function setAlly3($ally3) {
        $this->_ally3 = $ally3;
    }
    public function getAlly4() {
        return $this->_ally4;
    }
    public function setAlly4($ally4) {
        $this->_ally4 = $ally4;
    }
    public function getAssists() {
        return $this->_assists;
    }
    public function setAssists($assists) {
        $this->_assists = $assists;
    }
    public function getChampionId() {
        return $this->_championId;
    }
    public function setChampionId($championId) {
        $this->_championId = $championId;
    }
    public function getCreeps() {
        return $this->_creeps;
    }
    public function setCreeps($creeps) {
        $this->_creeps = $creeps;
    }
    public function getDeaths() {
        return $this->_deaths;
    }
    public function setDeaths($deaths) {
        $this->_deaths = $deaths;
    }
    public function getEnemy1() {
        return $this->_enemy1;
    }
    public function setEnemy1($enemy1) {
        $this->_enemy1 = $enemy1;
    }
    public function getEnemy2() {
        return $this->_enemy2;
    }
    public function setEnemy2($enemy2) {
        $this->_enemy2 = $enemy2;
    }
    public function getEnemy3() {
        return $this->_enemy3;
    }
    public function setEnemy3($enemy3) {
        $this->_enemy3 = $enemy3;
    }
    public function getEnemy4() {
        return $this->_enemy4;
    }
    public function setEnemy4($enemy4) {
        $this->_enemy4 = $enemy4;
    }
    public function getEnemy5() {
        return $this->_enemy5;
    }
    public function setEnemy5($enemy5) {
        $this->_enemy5 = $enemy5;
    }
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    public function getKills() {
        return $this->_kills;
    }
    public function setKills($kills) {
        $this->_kills = $kills;
    }
    public function getMatchCreation() {
        return $this->_matchCreation;
    }
    public function setMatchCreation($matchCreation) {
        $this->_matchCreation = $matchCreation;
    }
    public function getMatchDuration() {
        return $this->_matchDuration;
    }
    public function setMatchDuration($matchDuration) {
        $this->_matchDuration = $matchDuration;
    }
    public function getMatchId() {
        return $this->_matchId;
    }
    public function setMatchId($matchId) {
        $this->_matchId = $matchId;
    }
    public function getSide() {
        return $this->_side;
    }
    public function setSide($side) {
        $this->_side = $side;
    }
    public function getUserId() {
        return $this->_userId;
    }
    public function setUserId($userId) {
        $this->_userId = $userId;
    }
    public function getVictory() {
        return $this->_victory;
    }
    public function setVictory($victory) {
        $this->_victory = $victory;
    }
    public function getMatchType() {
        return $this->_matchType;
    }
    public function setMatchType($matchType) {
        $this->_matchType = $matchType;
    }
} 