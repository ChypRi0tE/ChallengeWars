<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 11:59
 */

namespace Challenge;

class Challenge {
    protected  $_id;
    protected $_title;
    protected $_dateCreation;
    protected $_dateEnd;
    protected $_idCreator;
    protected $_idPrize;
    protected $_description;
    protected $_isAdvanced;
    protected $_status;
    protected $_cost;
    protected $_type;
    protected $_image;
	protected $_champion;
	protected $_winner;

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
    public function getIsAdvanced() {
        return $this->_isAdvanced;
    }
    public function setIsAdvanced($isAdvanced) {
        $this->_isAdvanced = $isAdvanced;
    }
    public function getCost() {
        return $this->_cost;
    }
    public function setCost($cost) {
        $this->_cost = $cost;
    }
    public function getImage() {
        return $this->_image;
    }
    public function setImage($image) {
        $this->_image = $image;
    }
    public function getType() {
        return $this->_type;
    }
    public function setType($type) {
        $this->_type = $type;
    }
    public function getChampion() {
        return $this->_champion;
    }
    public function setChampion($champion) {
        $this->_champion = $champion;
    }
    public function getWinner() {
        return $this->_winner;
    }
    public function setWinner($winner) {
        $this->_winner = $winner;
    }
}