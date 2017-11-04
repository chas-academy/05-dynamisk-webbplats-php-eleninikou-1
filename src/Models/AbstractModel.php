<?php

namespace Teorihandbok\Models;

use src\Core\connection;

abstract class AbstractModel {
    
    protected $connection;

    public function __construct() {
        $this->connection = Connection::getInstance()->handler;
    }
}
