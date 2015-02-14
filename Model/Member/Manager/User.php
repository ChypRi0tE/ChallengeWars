<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 17:48
 */

namespace Member\Manager;


class User implements \Manager {
    private $_bdd;
    private $_table;

    function __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }

    public function    add($user) {
        if (!($user instanceof \Member\User)) {new \Error\TypeError("Manager/User", "User", $user->type);}
        $q = $this->_bdd->prepare("INSERT INTO " . $this->_table . "
                     (username, mail, password, avatar, points, rank)
                    VALUES (:username,
                    :mail,
                    :password,
                    :avatar,
                    :points,
                    :rank)
                  ");

        $q->bindValue(':username', $user->getUsername());
        $q->bindValue(':mail', $user->getMail());
        $q->bindValue(':password', $user->getPassword());
        $q->bindValue(':avatar', $user->getAvatar());
        $q->bindValue(':points', $user->getPoints());
        $q->bindValue(':rank', $user->getRank());
        $q->execute();
    }
    public function    get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Member\User($data);
    }
    public function    update($user) {
        if (!($user instanceof \Member\User)) {new \Error\TypeError("Manager/User", "User", $user->type);}
        $q = $this->_bdd->prepare("UPDATE " . $this->_table . "
                    SET username = :username,
                    mail = :mail,
                    password = :password,
                    avatar = :avatar,
                    points = :points,
                    rank = :rank
                    WHERE
                    id = :id
                  ");

        $q->bindValue(':username', $user->getUsername());
        $q->bindValue(':mail', $user->getMail());
        $q->bindValue(':password', $user->getPassword());
        $q->bindValue(':avatar', $user->getAvatar());
        $q->bindValue(':points', $user->getPoints());
        $q->bindValue(':rank', $user->getRank());
        $q->bindValue(':id', $user->getId());

        $q->execute();
    }
    public function    remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }
}