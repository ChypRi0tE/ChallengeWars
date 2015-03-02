<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 01/03/2015
 * Time: 19:36
 */

namespace Summoner;


class Summoner {
    protected   $_id;
    protected   $_userId;
    protected   $_summonerId;
    protected   $_summonerName;
    protected   $_dateValidation;
    protected   $_lastSync;

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
    public function getDateValidation() {
        return $this->_dateValidation;
    }
    public function setDateValidation($dateValidation) {
        $this->_dateValidation = $dateValidation;
    }
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    public function getSummonerId() {
        return $this->_summonerId;
    }
    public function setSummonerId($summonerId) {
        $this->_summonerId = $summonerId;
    }
    public function getSummonerName() {
        return $this->_summonerName;
    }
    public function setSummonerName($summonerName) {
        $this->_summonerName = $summonerName;
    }
    public function getUserId() {
        return $this->_userId;
    }
    public function setUserId($userId) {
        $this->_userId = $userId;
    }
    public function getLastSync() {
        return $this->_lastSync;
    }
    public function setLastSync($lastSync) {
        $this->_lastSync = $lastSync;
    }
} 