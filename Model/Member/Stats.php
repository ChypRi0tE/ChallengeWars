<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 09/02/2015
 * Time: 20:28
 */

namespace Member;


class Stats {
    protected $id;
    protected $idUser;
    protected $dateInscription;
    protected $challEntered;
    protected $challWon;
    protected $challCreated;
    protected $commentPosted;
    protected $nbFriends;

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

    public function getChallCreated() {
        return $this->challCreated;
    }
    public function setChallCreated($challCreated) {
        $this->challCreated = $challCreated;
    }
    public function getChallEntered() {
        return $this->challEntered;
    }
    public function setChallEntered($challEntered) {
        $this->challEntered = $challEntered;
    }
    public function getChallWon() {
        return $this->challWon;
    }
    public function setChallWon($challWon) {
        $this->challWon = $challWon;
    }
    public function getCommentPosted() {
        return $this->commentPosted;
    }
    public function setCommentPosted($commentPosted) {
        $this->commentPosted = $commentPosted;
    }
    public function getDateInscription() {
        return $this->dateInscription;
    }
    public function setDateInscription($dateInscription) {
        $this->dateInscription = $dateInscription;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
    public function getNbFriends() {
        return $this->nbFriends;
    }
    public function setNbFriends($nbFriends) {
        $this->nbFriends = $nbFriends;
    }
} 