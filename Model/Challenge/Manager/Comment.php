<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 13/02/2015
 * Time: 02:27
 */

namespace Challenge\Manager;


class Comment implements \Manager {
    private $_bdd;
    private $_table;

    public function     __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }
    public function     add($comment) {
        if (!($comment instanceof \Challenge\Comment)) {new \Error\TypeError("Manager/Comment", "Comment", $comment->type);}

        $q = $this->_bdd->prepare("INSERT INTO " . $this->_table . "
                    ('idChallenge', 'idUser', 'datePost', 'content')
                    VALUES (:idChallenge,
                    :idUser,
                    :datePost,
                    :content)
                  ");

        $q->bindValue(':idChallenge', $comment->getIdChallenge(), PDO::PARAM_INT);
        $q->bindValue(':idUser', $comment->getIdUser(), PDO::PARAM_INT);
        $q->bindValue(':datePost', $comment->getDatePost());
        $q->bindValue(':content', $comment->getContent());

        $q->execute();
    }
    public function     update($comment) {
        if (!($comment instanceof \Challenge\Comment)) {throw new TypeError("Manager/Comment", "Comment", $comment->type);}
        $q = $this->_bdd->prepare('UPDATE ' . $this->_table . '
                    SET idChallenge = :idChallenge,
                    idUser = :idUser,
                    datePost = :datePost,
                    content = :content
                    WHERE id = :id
                  ');

        $q->bindValue(':idChallenge', $comment->getIdChallenge(), PDO::PARAM_INT);
        $q->bindValue(':idUser', $comment->getIdUser(), PDO::PARAM_INT);
        $q->bindValue(':datePost', $comment->getDatePost());
        $q->bindValue(':content', $comment->getContent());
        $q->bindValue(':id', $comment->getId(), PDO::PARAM_INT);

        $q->execute();
    }
    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Challenge\Comment($data);
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }


    public function     getForChallenge($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idChallenge = '.$id.' ORDER BY datePost ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Comment($data);
        }
        return $list;
    }
    public function     getForUser($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idUser = '.$id.' ORDER BY datePost DESC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Comment($data);
        }
        return $list;
    }

    public function     getNbForChallenge($id) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE idChallenge = '.$id);
        return $q->fetch()[0];
    }
}