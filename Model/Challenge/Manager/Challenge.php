<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:31
 */

namespace Challenge\Manager;
use Manager;

class Challenge implements Manager {
    private $_bdd;
    private $_table;

    public function     __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }
    public function     add($challenge) {
        if (!($challenge instanceof \Challenge\Challenge)) {new \Error\TypeError("Manager/Challenge", "Challenge", $challenge->type);}

        $q = $this->_bdd->prepare("INSERT INTO " . $this->_table . "
                    ('title', 'dateCreation', 'dateEnd', 'idCreator', 'idPrize', 'description', 'isFeatured', 'status')
                    VALUES (:title,
                    :dateCreation,
                    :dateEnd,
                    :idCreator,
                    :idPrize,
                    :description,
                    :isFeatured,
                    :status)
                  ");

        $q->bindValue(':title', $challenge->getTitle());
        $q->bindValue(':dateCreation', $challenge->getDateCreation());
        $q->bindValue(':dateEnd', $challenge->getDateEnd());
        $q->bindValue(':idCreator', $challenge->getIdCreator(), PDO::PARAM_INT);
        $q->bindValue(':idPrize', $challenge->getIdPrize(), PDO::PARAM_INT);
        $q->bindValue(':description', $challenge->getDescription());
        $q->bindValue(':isFeatured', $challenge->getIsFeatured(), PDO::PARAM_BOOL);
        $q->bindValue(':status', $challenge->getStatus(), PDO::PARAM_INT);

        $q->execute();
    }
    public function     update($challenge) {
        if (!($challenge instanceof \Challenge\Challenge)) {throw new TypeError("Manager/Challenge", "Challenge", $challenge->type);}
        $q = $this->_bdd->prepare('UPDATE ' . $this->_table . '
                    SET title = :title,
                    dateCreation = :dateCreation,
                    dateEnd = :dateEnd,
                    idCreator = :idCreator,
                    idPrize = :idPrize,
                    description = :description,
                    isFeatured = :isFeatured,
                    status = :status
                    WHERE id = :id
                  ');

        $q->bindValue(':title', $challenge->getTitle());
        $q->bindValue(':dateCreation', $challenge->getDateCreation());
        $q->bindValue(':dateEnd', $challenge->getDateEnd());
        $q->bindValue(':idCreator', $challenge->getIdCreator(), PDO::PARAM_INT);
        $q->bindValue(':idPrize', $challenge->getIdPrize(), PDO::PARAM_INT);
        $q->bindValue(':description', $challenge->getDescription());
        $q->bindValue(':isFeatured', $challenge->getIsFeatured(), PDO::PARAM_BOOL);
        $q->bindValue(':status', $challenge->getStatus(), PDO::PARAM_INT);
        $q->bindValue(':id', $challenge->getId(), PDO::PARAM_INT);

        $q->execute();
    }
    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        $data = $q->fetch();
        return new \Challenge\Challenge($data);
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }


    /**
     * Returns the next challenge to end.
     * @return \Challenge\Challenge
     */
    public function     getNext() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' ORDER BY dateEnd ASC LIMIT 1');
        $data = $q->fetch();
        return new \Challenge\Challenge($data);
    }
    /**
     * Returns the t challenge to end.
     * @return \Challenge\Challenge
     */
    public function     getFeatured() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 1 AND isFeatured = 1 ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getEnded() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 2 ORDER BY dateEnd DESC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getOngoing() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 1 ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getCreated($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idCreator = '.$id.' ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getWon($id) {
        //TODO
    }
    public function     getEntered($id) {
        //TODO
    }
}