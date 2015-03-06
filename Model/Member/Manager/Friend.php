<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 06/03/2015
 * Time: 11:09
 */

namespace Member\Manager;


class Friend implements \Manager {
    private $_bdd;
    private $_table;

    public function     __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }
    public function     add($friend) {
        if (!($friend instanceof \Challenge\Friend)) {new \Error\TypeError("Manager/Friend", "Comment", $friend->type);}
        $q = $this->_bdd->query("INSERT INTO " . $this->_table . " (userId, friendId, dateAdd)
            VALUES (".$friend->getUserId().",
                    ".$friend->getFriendId().",
                    '".$friend->getDateAdd()."')
                    ");
    }

    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Challenge\Friend($data);
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function    update($item) {
        // TODO: Implement update() method.
    }
    
    public function   getFriendship($user, $current) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE userId = '.$user.' AND friendId = '.$current);
        if ($data = $q->fetch())
          return true;
        return false;
    }
    public function  removeFriendship($user, $current) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE userId = '.$user.' AND friendId = '.$current);
    }
}