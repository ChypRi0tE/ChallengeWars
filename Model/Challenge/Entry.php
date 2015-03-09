<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 03:07
 */

namespace Challenge;


class Entry {
    protected $id;
    protected $idChallenge;
    protected $idUser;
    protected $dateEntry;
    protected $points;

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

    public function getDateEntry() {
        return $this->dateEntry;
    }
    public function setDateEntry($dateEntry) {
        $this->dateEntry = $dateEntry;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getIdChallenge() {
        return $this->idChallenge;
    }
    public function setIdChallenge($idChallenge) {
        $this->idChallenge = $idChallenge;
    }
    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
    public function getPoints() {
        return $this->points;
    }
    public function setPoints($points) {
        $this->points = $points;
    }
} 