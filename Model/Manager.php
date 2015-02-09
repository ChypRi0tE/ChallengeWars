<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:31
 */

interface Manager {
    public function    add($item);
    public function    get($id);
    public function    update($item);
    public function    remove($id);
} 