<?php

// Include the variables
require ('config.php');

try {   // Connecting to the db with users table
    $connection = new PDO("mysql:host=127.0.0.1;dbname=teorihandboken;charset=utf8","root","root");
    // Changing the errormode so that PDO throws an exception every time something goes wrong
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    //getMessage method from exception model
    echo $e->getMessage();
    die();
}