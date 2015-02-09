<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 10/02/2015
 * Time: 00:17
 */

namespace Challenge;


class Prize {
    protected $id;
    protected $title;

    function __construct($id, $title) {
        $this->id = $id;
        $this->title = $title;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
} 