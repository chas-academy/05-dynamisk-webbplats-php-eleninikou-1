<?php

session_start();

$msg = "";

     // Run the code only if form is submitted
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) 
{   
        // If username and password is OK -> change page
        if ($_POST['username'] == 'eleni' && $_POST['password'] == 'eleni')
        {
            $_SESSION['valid'] = true;
            header("location: ../../views/admin.php");
        } else {       
            $msg = "Kunde inte logga in";
        }
} 
