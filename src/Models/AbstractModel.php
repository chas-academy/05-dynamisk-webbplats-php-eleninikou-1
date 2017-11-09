<?php

namespace Teorihandbok\Models;

use Teorihandbok\src\Core\Connection;

abstract class AbstractModel {
    protected $db;

    public function __construct() {
        $this->db = Connection::getInstance()->handler;
    }
}