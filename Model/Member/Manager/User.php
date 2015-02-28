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
                     (username, mail, password, avatar, isAdvanced, isValidated, rank)
                    VALUES (:username,
                    :mail,
                    :password,
                    :avatar,
                    :isAdvanced,
                    :isValidated,
                    :rank)
                  ");

        $q->bindValue(':username', $user->getUsername());
        $q->bindValue(':mail', $user->getMail());
        $q->bindValue(':password', $user->getPassword());
        $q->bindValue(':avatar', $user->getAvatar());
        $q->bindValue(':isAdvanced', $user->getIsAdvanced());
        $q->bindValue(':isValidated', $user->getIsValidated());
        $q->bindValue(':rank', $user->getRank());
        $q->execute();
    }
    public function    get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        if ($data = $q->fetch())
          return new \Member\User($data);
        return null;
    }
    public function    update($user) {
        if (!($user instanceof \Member\User)) {new \Error\TypeError("Manager/User", "User", $user->type);}
        $q = $this->_bdd->prepare("UPDATE " . $this->_table . "
                    SET username = :username,
                    mail = :mail,
                    password = :password,
                    avatar = :avatar,
                    isAdvanced = :isAdvanced,
                    isValidated = :isValidated,
                    rank = :rank
                    WHERE
                    id = :id
                  ");

        $q->bindValue(':username', $user->getUsername());
        $q->bindValue(':mail', $user->getMail());
        $q->bindValue(':password', $user->getPassword());
        $q->bindValue(':avatar', $user->getAvatar());
        $q->bindValue(':isAdvanced', $user->getIsAdvanced());
        $q->bindValue(':isValidated', $user->getIsValidated());
        $q->bindValue(':rank', $user->getRank());
        $q->bindValue(':id', $user->getId());

        $q->execute();
    }
    public function    remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }
    public function    getFromName($name) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE username = "'.$name.'"');
        if ($data = $q->fetch())
          return new \Member\User($data);
        return null;
    }
    public function     getAll() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' ORDER BY username ASC');
        $list = [];
        while ($data = $q->fetch()){
            $list[] = new \Member\User($data);
        }
        return $list;
    }
    public function     getNbUsers() {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table);
        return $q->fetch()[0];
    }
}