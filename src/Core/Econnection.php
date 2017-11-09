<?php

namespace Teorihandbok\src\Core;

//use Teorihandbok\src\Core\config;
//use Teorihandbok\Utils\singleton; 
use PDO;

// Include the variables
require ('Econfig.php');



try { 
    // Connecting to the db with users table
    $connection = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8","root","root");
    
    // Changing the errormode so that PDO throws an exception every time something goes wrong
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    //getMessage method from exception model
    echo $e->getMessage();
    die();
}