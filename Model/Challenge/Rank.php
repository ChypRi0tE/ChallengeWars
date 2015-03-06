<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 05/03/2015
 * Time: 23:06
 */

namespace Challenge;


class Rank {
    protected   $_id;
    protected   $_challengeId;
    protected   $_userId;
    protected   $_points;

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
    public function getChallengeId() {
        return $this->_challengeId;
    }
    public function setChallengeId($challengeId) {
        $this->_challengeId = $challengeId;
    }
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    public function getPoints() {
        return $this->_points;
    }
    public function setPoints($points) {
        $this->_points = $points;
    }
    public function getUserId() {
        return $this->_userId;
    }
    public function setUserId($userId) {
        $this->_userId = $userId;
    }
}