<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 06/03/2015
 * Time: 11:06
 */

namespace Member;


class Friend {
    protected   $_id;
    protected   $_userId;
    protected   $_friendId;
    protected   $_dateAdd;

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
    public function getDateAdd() {
        return $this->_dateAdd;
    }
    public function setDateAdd($dateAdd) {
        $this->_dateAdd = $dateAdd;
    }
    public function getFriendId() {
        return $this->_friendId;
    }
    public function setFriendId($friendId) {
        $this->_friendId = $friendId;
    }
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    public function getUserId() {
        return $this->_userId;
    }
    public function setUserId($userId) {
        $this->_userId = $userId;
    }


} 