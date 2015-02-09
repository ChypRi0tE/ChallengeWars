<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:25
 */

namespace Error;


class Error {
    /*
     * Error types:
     * 1 - Site
     * 2 - User
     * 3 - Forum
     * 4 - Other
     */
    protected $_id;
    protected $_type;
    protected $_source;
    protected $_message;

    function __construct($_message, $_source, $_type) {
        $this->_message = $_message;
        $this->_source = $_source;
        $this->_type = $_type;
    }

    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    public function getType() {
        return $this->_type;
    }
    public function setType($type) {
        $this->_type = $type;
    }
    public function getSource() {
        return $this->_source;
    }
    public function setSource($source) {
        $this->_source = $source;
    }
    public function getMessage() {
        return $this->_message;
    }
    public function setMessage($message) {
        $this->_message = $message;
    }
}