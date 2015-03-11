<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 11:43
 */

namespace Member;


class Message {
    private $_title;
    private $_idUser;
    private $_idAuthor;
    private $_content;
    private $_date;

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
    public function getIdAuthor() {
        return $this->_idAuthor;
    }
    public function setIdAuthor($idAuthor) {
        $this->_idAuthor = $idAuthor;
    }
    public function getContent() {
        return $this->_content;
    }
    public function setContent($content) {
        $this->_content = $content;
    }
    public function getDate() {
        return $this->_date;
    }
    public function setDate($date) {
        $this->_date = $date;
    }
    public function getTitle() {
        return $this->_title;
    }
    public function setTitle($title) {
        $this->_title = $title;
    }
    public function getIdUser() {
        return $this->_idUser;
    }
    public function setIdUser($idUser) {
        $this->_idUser = $idUser;
    }
} 