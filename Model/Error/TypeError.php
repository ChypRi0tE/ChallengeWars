<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 14:56
 */

namespace Error;


class TypeError extends Error {
    private $_expected;
    private $_received;

    public function __construct($source, $expected, $received) {
        $this->_source = $source;
        $this->_message = "Wrong type passed, expected ".$this->_expected." received ".$this->_received;
        $this->_type = 4;

        $this->_expected = $expected;
        $this->_received = $received;
    }

    public function getReceived() {
        return $this->_received;
    }
    public function setReceived($received) {
        $this->_received = $received;
    }
    public function getExpected() {
        return $this->_expected;
    }
    public function setExpected($expected) {
        $this->_expected = $expected;
    }
} 