<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 11:59
 */

namespace Challenge;

class Challenge {
    private $_id;
    private $_title;
    private $_dateCreation;
    private $_dateEnd;
    private $_idCreator;
    private $_idPrize;
    private $_description;
    private $_isFeatured;
    private $_status;


    public function __construct(array $data) {
        $this->create($data);
    }
    private function create(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                throw new SiteError("Challenge", "Couldn't create challenge from array.", $data);
            }
        }
    }

    /* ---------------------------
     * GETTERS-SETTERS------------
     * ---------------------------
     */
    public function getDescription() {
        return $this->_description;
    }
    public function setDescription($description) {
        $this->_description = $description;
    }
    public function getDateCreation() {
        return $this->_dateCreation;
    }
    public function setDateCreation($dateCreation) {
        $this->_dateCreation = $dateCreation;
    }
    public function getDateEnd() {
        return $this->_dateEnd;
    }
    public function setDateEnd($dateEnd) {
        $this->_dateEnd = $dateEnd;
    }
    public function getGame() {
        return $this->_game;
    }
    public function setGame($game) {
        $this->_game = $game;
    }
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    public function getIdCreator() {
        return $this->_idCreator;
    }
    public function setIdCreator($idCreator) {
        $this->_idCreator = $idCreator;
    }
    public function getIdPrize() {
        return $this->_idPrize;
    }
    public function setIdPrize($idPrize) {
        $this->_idPrize = $idPrize;
    }
    public function getTitle() {
        return $this->_title;
    }
    public function setTitle($title) {
        $this->_title = $title;
    }
    public function getStatus() {
        return $this->_status;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }
    public function getIsFeatured() {
        return $this->_isFeatured;
    }
    public function setIsFeatured($isFeatured) {
        $this->_isFeatured = $isFeatured;
    }
}