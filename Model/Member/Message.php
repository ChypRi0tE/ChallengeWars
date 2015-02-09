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
    private $_author;
    private $_content;
    private $_date;
    private $_status;

    public function getAuthor() {
        return $this->_author;
    }
    public function setAuthor($author) {
        $this->_author = $author;
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