<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 07/02/2015
 * Time: 15:46
 */

namespace Member;


class User {
    protected   $_id;
    protected   $_username;
    protected   $_mail;
    protected   $_password;
    protected   $_avatar;
    protected   $_points;
    protected   $_rank;

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
    public function getAvatar() {
        return $this->_avatar;
    }
    public function setAvatar($avatar) {
        $this->_avatar = $avatar;
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
    public function getMail() {
        return $this->_mail;
    }
    public function setMail($mail) {
        $this->_mail = $mail;
    }
    public function getUsername() {
        return $this->_username;
    }
    public function setUsername($username) {
        $this->_username = $username;
    }
    public function getRank() {
        return $this->_rank;
    }
    public function setRank($rank) {
        $this->_rank = $rank;
    }
    public function getPassword() {
        return $this->_password;
    }
    public function setPassword($password) {
        $this->_password = $password;
    }
}