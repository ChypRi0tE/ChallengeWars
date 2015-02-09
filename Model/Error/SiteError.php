<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:25
 */

namespace Error;


class SiteError extends Error {
    private $_array;

    public function __construct($source, $message, $array) {
        $this->_source = $source;
        $this->_message = $message;
        $this->_type = 1;

        $this->_array = $array;
    }

    public function getArray() {
        return $this->_array;
    }
    public function setArray($array) {
        $this->_array = $array;
    }
} 