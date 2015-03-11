<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 10/03/2015
 * Time: 20:56
 */

namespace Member\Manager;


class Message implements \Manager {
    private $_bdd;
    private $_table;

    public function     __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }
    public function     add($message) {
        if (!($message instanceof \Challenge\Message)) {new \Error\TypeError("Manager/Message", "Message", $message->type);}
        $q = $this->_bdd->query("INSERT INTO " . $this->_table . " (title, idUser, idAuthor, content, date)
            VALUES ('".$message->getTitle()."',
                    ".$message->getIdUser().",
                    ".$message->getIdAuthor().",
                    '".$message->getContent()."',
                    '".$message->getDate()."')
                    ");
    }

    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Challenge\Message($data);
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function    update($item) {
        // TODO: Implement update() method.
    }

    public function     getForUser($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idUser = '.$id);
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Member\Message($data);
        }
        return $list;
    }
} 