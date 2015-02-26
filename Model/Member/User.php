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
    protected   $_rank;
    protected   $_isAdvanced;
    protected   $_isValidated;

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
    public function getIsAdvanced() {
        return $this->_isAdvanced;
    }
    public function setIsAdvanced($isAdvanced) {
        $this->_isAdvanced = $isAdvanced;
    }
    public function getIsValidated() {
        return $this->_isValidated;
    }
    public function setIsValidated($isValidated) {
        $this->_isValidated = $isValidated;
    }
}