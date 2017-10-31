<?php 

//This file is necessary for the script to run
require "/config.php";

// Try-catch to show an error-message if something goes wrong trying to setup the database
try 
{
    $connection = new PDO("mysql:host=$host", $username, $password, $options);

    // Creating a variable with the database and table I wrote in init.sql
    $sql = file_get_contents("data/init.sql"); 
    $connection->exec($sql); // Execute -> creates the database and table

    echo "Success!";
} 

// Shows the information in file and the error-message
catch (PDOException $error)
{
	echo $sql . "<br>" . $error->getMessage();
}

?>
