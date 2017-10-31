<?php

try 
{
    require "/config.php"   
    // Connecting to the db with users table
    $connection = new PDO($DSN, $DB_USER, $DB_PWD);
    // Changing the errormode so that PDO throws an exception every time something goes wrong
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) 
{       
    //getMessage method from exception model
    echo $e->getMessage();
    die();
}