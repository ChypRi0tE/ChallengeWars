<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 09/02/2015
 * Time: 20:28
 */

namespace Challenge;


class Comment {
    protected   $id;
    protected   $idChallenge;
    protected   $idUser;
    protected   $datePost;
    protected   $content;

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
    public function getContent() {
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function getDatePost() {
        return $this->datePost;
    }
    public function setDatePost($datePost) {
        $this->datePost = $datePost;
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
    public function setIdUser($idAuthor) {
        $this->idUser = $idAuthor;
    }
    public function getIdChallenge() {
        return $this->idChallenge;
    }
    public function setIdChallenge($idChallenge) {
        $this->idChallenge = $idChallenge;
    }
}