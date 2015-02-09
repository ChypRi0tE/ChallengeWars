<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:06
 */

namespace Forum;


class Topic {
    private $_id;
    private $_title;
    private $_idAuthor;
    private $_dateCreation;
    private $_status;

    public function getDateCreation() {
        return $this->_dateCreation;
    }

    public function setDateCreation($dateCreation) {
        $this->_dateCreation = $dateCreation;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getIdAuthor() {
        return $this->_idAuthor;
    }

    public function setIdAuthor($idAuthor) {
        $this->_idAuthor = $idAuthor;
    }

    public function getStatus() {
        return $this->_status;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function setTitle($title) {
        $this->_title = $title;
    }
}